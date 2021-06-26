<?php

namespace App\Http\Controllers\BP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Models\Master\RegionalData\IDN\Island;
use App\Models\Admin\StudentData\Student;
use App\Cart;

class StudentController extends Controller
{
    public function dashboard(){
        $student = Student::where('EMAIL',auth()->user()->email)->first();
        return view('student.index',compact('student'));
    }
    public function profile(){
        $countries = Country::get();
        $islands = Island::get();
        $student = Student::where('EMAIL',auth()->user()->email)->first();
        return view('student.profile',compact('countries','islands','student'));
    }
    public function update_profile(Request $request){
        $student = Student::find($request->student_id)->update($request->all());
        return redirect('/student/profile');
    }

    public function payments(){
        $transactions = Cart::selectRaw('carts.*,users.email, users.name as user_name')->where('carts.user_id',auth()->user()->id)->join('users','users.id','carts.user_id')->with(['items' => function($query){
            return $query->selectRaw('cart_items.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET');
        }])->with('payments')->get();
        return view('student.payments',compact('transactions'));
    }

    public function print_card(){
        $student = Student::where('EMAIL',auth()->user()->email)->first();
        return view('student.print-card',compact('student'));        
    }
}
