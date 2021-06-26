<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\MerchantBankAccount;

class ProfileController extends Controller
{ 
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        if(auth('merchant')->check()){
            $route = 'merchant';
            $title = 'Merchant';      
            $merchant_banks = MerchantBankAccount::get();
            return view('merchant.profile.edit',['default_route' => $route,'title' => $title,'merchant_banks' => $merchant_banks]);
        }
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
     if(auth('merchant')->check()){
        if($request->hasFile('siup')){
                $path = "BP/data-perusahaan/recruitment/promo/";
                $ext = $request->siup->getClientOriginalExtension();
                $path_ktp = Storage::disk('public')->putFileAs($path, $request->siup, 'ktp'.'-'.uniqid().'.'.$ext);
        }
        auth('merchant')->user()->update($request->except('siup'));
        return back()->withStatus(__('Profile successfully updated.'));
    }else{
        if(isset($request->tanggal_lahir) && isset($request->bulan_lahir) && isset($request->tahun_lahir) ){

            $request->merge(["birth_date" => $request->tahun_lahir.'-'.$request->bulan_lahir.'-'.$request->tanggal_lahir]);
        }
        if($request->employee_id != ""){
            $cek_employee = User::where('employee_id',$request->employee_id)->first();
            if(!$cek_employee ){
                $update = auth()->user()->update(['employee_id' => $request->employee_id]);
            }else{
                if($cek_employee->id != auth()->user()->id) {

                    return redirect()->back()->withStatus('Employee account ('.$request->employee_id.') already exist for user with email : '.$cek_employee->email.'<br>Do you want to switch with this account instead ? &emsp; <button type="button" class="btn btn-sm" style="background:white;color:black;" onclick="alert('."'This feature is not available yet !'".')">yes</button> or <button type="button" class="btn btn-sm" style="background:white;color:black;" onclick="alert('."'This feature is not available yet !'".')">no</button> ');

                }
            }
        }
        auth()->user()->update($request->all());
        return back()->withStatus(__('Profile successfully updated.'));
    }
}

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if(auth('merchant')->check()){
        auth('merchant')->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
}
}
