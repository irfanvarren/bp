<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
class UsersController extends Controller
{
      public $dashboard = "admin";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = $user->with('roles')->withTrashed()->orderBy('id','desc')->get();
        return view('admin.users.index',['dashboard'=> $this->dashboard,'users' => $users ]);   //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with(['roles' => function($query){
            return $query->pluck('id')->all();
        }])->find($id);
        $roles = Role::where('guard_name','web')->get();
        $employees = Karyawan::get();
        return view('admin.users.edit',compact('user','roles','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->employee_id != ""){
            $cek_employee = User::where('employee_id',$request->employee_id)->first();
            if(!$cek_employee){
            $update = $user->update(['employee_id' => $request->employee_id]);
            }else{
                if($user->employee_id != $request->employee_id){
                return redirect()->back()->withStatus('Employee account ('.$request->employee_id.') already exist for user with email : '.$cek_employee->email.'<br>Are you sure want to continue? &emsp; <button type="button" class="btn btn-sm" style="background:white;color:black;" onclick="alert('."'This feature is not available yet !'".')">yes</button> or <button type="button" class="btn btn-sm" style="background:white;color:black;" onclick="alert('."'This feature is not available yet !'".')">no</button> ');
                }
            }
        }
        if(\Auth::user()->id == $id){
        $old_pass = $user->password;
        if(!Hash::check($request->old_password,$old_pass)){
            return redirect()->back()->withStatus('Incorrect Old Password');
        }
        if($request->password != $request->password_confirmation){
         return redirect()->back()->withStatus("New Password didn't match");   
        }
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));
        }else if(\Auth::user()->hasRole('Admin') || \Auth::user()->hasRole('Head Admission') || \Auth::user()->hasRole('Super Admin') || \Auth::user()->hasRole('Director')){
            $user->update($request->all());
        }
        $user->syncRoles(explode('|',$request->roles));
        return redirect()->route('admin-users.index')->withStatus('User has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::find($id)->delete();
        return redirect()->route('admin-users.index')->withStatus('User has been successfully deleted');
    }
}
