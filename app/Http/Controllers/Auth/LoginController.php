<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/mensajes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }




	 /**
		* Redirect the user to the Facebook authentication page.
		*
		* @return \Illuminate\Http\Response
		*/
	 public function redirectToProvider()
	 {
			return Socialite::driver('facebook')->redirect();
	 }

	 /**
		* Obtain the user information from GitHub.
		*
		* @return \Illuminate\Http\Response
		*/
	 public function handleProviderCallback()
	 {
			$userSocial = Socialite::driver('facebook')->user();

			$findUser = User::where('email',$userSocial->getEmail())->first();

			if($findUser){
				 Auth::login($findUser);

			}else {


				 $int = User::firstOrCreate(
						 [
								 'email' => "{$userSocial->getEmail()}",
								 'name' => "{$userSocial->getName()}",
						 ]);
				 Auth::login($userSocial);

			}

			return redirect()->route('home');

	 }
}
