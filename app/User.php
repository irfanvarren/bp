<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;
use App\Notifications\StudentVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\MemberRole;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;
    use SoftDeletes;
    protected $guard_name = "web";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','no_telepon','gender','birth_date' ,'password','client_id','employee_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendStudentEmailVerificationNotification()
    {
    $this->notify(new StudentVerifyEmail);
    }


    public function social_account(){
        return $this->hasOne('App\SocialAccount');
    }

    public function cart_data($user_id){
         $cart_data = Cart::where('user_id',$user_id)->where('status',0)->with(['items' =>function($query){
            return $query->selectRaw('cart_items.*,tb_paket_bimbel.NAMA as NAMA_PAKET')->join('tb_paket_bimbel','tb_paket_bimbel.KD','cart_items.REF_PAKET');
         }])->first();
         return $cart_data;
    }

    public function routeNotificationForSlack($notification) {
    return "https://hooks.slack.com/services/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";
    }

    public function member_role(){
//        dd($this->total_transactions());
        return MemberRole::find($this->member_role_id)->value('roles');
    }

    public function total_transactions(){
        return CartPayment::selectRaw('sum(payment_total) as total_transactions')->where('user_id',$this->id)->where('status',2)->value('total_transactions');
    }
  /*  public function roles()
        {
            return $this->belongsToMany('App\Role');
        }

    public function is($roleName){
      foreach ($this->roles()->get() as $role)
        {
            if ($role->name == $roleName)
            {
                return true;
            }
        }

        return false;
    }*/
}
