<?php

namespace App\Http\Controllers\Admin;

use App\Merchant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MerchantRequest;
use Storage;
use App\MemberBalanceOut;
class MerchantController extends Controller
{
  public $dashboard = "admin";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Merchant $model)
    {
      return view('admin.merchant.index',['dashboard'=> $this->dashboard,'merchants' => $model->paginate(15)]);  //
  }
  public function cek_merchant(Merchant $model,Request $request){

      $status = $request->status;

      if($status == "true"){
        $status = 1;
    }else{
        $status = 0;
    }
    $id = $request->id;
    $model = $model::find($id);
    $model->status = $status;
    if($status){
    $model->code = $this->generate_code($model->name);
    }
    $model->save();
    return view('admin.merchant.cek_merchant',['merchants' => $model->paginate(15)]);
}

public function generate_code($name){
    $code = mt_rand(pow(10, 4-1), pow(10, 4)-1);
    $initial = $this->generate_initial($name);
    $code = "M-".$initial.$code;
    $cek_code_exists = Merchant::where('code',$code)->exists();
    if($cek_code_exists){
        return $this->generate_code();
    }
    return $code;
}

public function generate_initial(string $name) : string
{
    $words = explode(' ', $name);
    if (count($words) >= 2) {
        return strtoupper(substr($words[0], 0, 1) . substr(end($words), 0, 1));
    }
    return $this->makeInitialsFromSingleWord($name);
}

protected function makeInitialsFromSingleWord(string $name) : string
{
    preg_match_all('#([A-Z]+)#', $name, $capitals);
    if (count($capitals[1]) >= 2) {
        return substr(implode('', $capitals[1]), 0, 2);
    }
    return strtoupper(substr($name, 0, 2));
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
        //
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
        $merchant = Merchant::find($id);
         if($request->hasFile('file_siup')){
                $path = $id;
                $ext = $request->file_siup->getClientOriginalExtension();
                $path_siup = Storage::disk('member-les')->putFileAs($path, $request->file_siup, 'siup'.'-'.uniqid().'.'.$ext);
                $request->merge(['siup' => $path_siup]);
        }
        if($request->hasFile('file_logo')){
                $path = $id;
                $ext = $request->file_logo->getClientOriginalExtension();
                $path_logo = Storage::disk('member-les')->putFileAs($path, $request->file_logo, 'logo'.'.'.$ext);
                $request->merge(['lokasi_logo' => $path_logo]);
        }
        if($this->check_slug($request->slug) && $merchant->slug != $request->slug){
            return back()->withError('Domain merchant sudah ada !');
        }
        $merchant->update($request->all());
        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function check_slug($slug){
        $model = new Merchant;
        $slug = str_slug($slug);
        return $model::whereSlug($slug)->exists();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
