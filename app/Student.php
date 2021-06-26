<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Authenticatable;  
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\User as Authenticatable;


use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract; // this is an interface
use Illuminate\Database\Eloquent\SoftDeletes;

/*class Student extends Model implements
AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract,MustVerifyEmailContract*/
class Student extends Authenticatable implements MustVerifyEmailContract
{
  use Notifiable;
  use HasRoles;
  use SoftDeletes;

  //use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail,HasRoles,Notifiable; 
  protected $guard_name = 'web';
  protected $table = "students";

  protected $fillable = [
  	'name' ,'email','email_verified_at','password','remember_token','client_id','visa_status','status','marketing_id','country','user_id'
  ];
  public function test(){
    $role = Role::create(['guard_name' => 'student', 'name' => 'Student']);
  }
  

   public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\StudentVerifyEmail);
    }
}
