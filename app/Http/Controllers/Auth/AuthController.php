<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SocialAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\User as ProviderUser;

class AuthController extends Controller
{

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
         try {
            $user = Socialite::driver($provider)->stateless()->user();
        }catch (ClientException  $e) {
                return redirect('login')->withMessage("Something wrong, please try to login again");
        }
      
          
        $authUser = $this->findOrCreateUser($user, $provider);
        if(isset($authUser->error_msg)){
            return redirect('login')->withMessage($authUser->error_msg);
        }
        Auth::login($authUser, true);
        if(session('social_redirect') != ""){
            $redirect = session('social_redirect');
            session()->forget('social_redirect');
            return redirect($redirect.'/#');
        }
        return redirect('/#');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser( $user, $provider)
    {
        $authUser = SocialAccount::where('provider_user_id',$user->id)->withTrashed()->first();
        if ($authUser) {
            $return = $authUser->user()->first();
            if($return){
                return $return;
            }else{
                $error ='{"error_msg" : "Your account has been banned by admin ! please contact us at info@bestpartnereducation.com regarding this problem"}';
                return json_decode($error);
            }
        }
        else{

            $data_user = User::where('email',$user->email)->withTrashed()->first();

            if(!$data_user){

                $data_user = User::create([
                    'name'     => $user->name,
                    'email'    => !empty($user->email)? $user->email : '' ,
                ]);

            }

            $data_user->social_account()->create([
                'user_id' => $data_user->id,
                'provider_user_id' => $user->id,
                'provider' => $provider
            ]);

            return $data_user;

        }
    }
}