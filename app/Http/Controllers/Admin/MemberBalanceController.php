<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\MemberBalanceIn;
use App\BalanceType;
use App\User;

class MemberBalanceController extends Controller
{
    public function index(Request $request){
    	$user_id = $request->user_id;
    	$user = User::find($user_id);
    	$member_balances = MemberBalanceIn::where('user_id',$user_id)->get();

    	if(!$user){
    		abort(404,"User tidak ditemukan !");
    	}
    	return view('admin.member-balance.index',compact('member_balances','user_id','user'));
    }

    public function create(Request $request){
    	$user_id = $request->user_id;
    	$balance_types = BalanceType::get();
    	return view('admin.member-balance.create',compact('user_id','balance_types'));
    }

    public function store(Request $request){
    	$balance = MemberBalanceIn::create($request->all());
    	return redirect()->route('admin-member-balance.index',['user_id' => $request->user_id]);
    }

    public function edit($id){
    	$member_balance = MemberBalanceIn::find($id);
    	$balance_types = BalanceType::get();
    	return view('admin.member-balance.edit',compact('member_balance','balance_types'));
    }

    public function update($id, Request $request){
    	$update = MemberBalanceIn::find($id)->update($request->all());
    	return redirect()->route('admin-member-balance.index',['user_id' => $request->user_id]);
    }

    public function destroy($id,Request $request){
    	$delete = MemberBalanceIn::find($id)->delete();
    	return redirect()->route('admin-member-balance.index',['user_id' => $request->user_id]);
    }

}
