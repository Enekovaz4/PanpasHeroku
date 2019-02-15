<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function redirectTo() {
        // Check user role
        switch (Auth::user()->perfil_id) {
            case 1:
                    return '/admin/dashboard';
                break;
            case 2:
                    $url = '/users/'.Auth::user()->username;
                    return $url;
                break;
            default:
                    return '/';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //*******************************************************************************
    //  :: Autenticación por Red(es) Social(es) - ini ::

    /**
    * Redirigiendo al usuario a la página de autenticación del proveedor del servicio.
    *
    * @return \Illuminate\Http\Redirect
    */
    public function redirectToProvider($provider)
    {
        config(['services.' . $provider . '.redirect' => route('provider.callback', [$provider])]);
        return Socialite::driver($provider)->redirect();
    }

    /**
    * Obteniendo la información del usuario desde el proveedor del servicio.
    *
    * @return \Illuminate\Http\Response
    */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $user->perfil_id = 2;
        $user = User::updateOrCreate(
            [
                'email' => $auth_user->email
            ],
            [
                'token' => $auth_user->token,
                'name' => $auth_user->name
            ]
        );

        Auth::login($user, true);
        ////return redirect()->to('/users');
        $this->redirectTo();
    }

    //  :: Autenticación por Red(es) Social(es) - fin ::
    //*******************************************************************************
}
