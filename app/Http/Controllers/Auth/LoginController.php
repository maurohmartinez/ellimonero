<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Backpack\CRUD\app\Library\Auth\AuthenticatesUsers;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $data = []; // the information we send to the view

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
    use AuthenticatesUsers {
        login as defaultLogin;
        logout as defaultLogout;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $guard = backpack_guard_name();

        $this->middleware("guest:$guard", ['except' => 'logout']);

        // ----------------------------------
        // Use the admin prefix in all routes
        // ----------------------------------

        // If not logged in redirect here.
        $this->loginPath = property_exists($this, 'loginPath') ? $this->loginPath
            : backpack_url('login');

        // Redirect here after successful login.
        $this->redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo
            : backpack_url('dashboard');

        // Redirect here after logout.
        $this->redirectAfterLogout = property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout
            : backpack_url();
    }

    /**
     * Return custom username for authentication.
     *
     * @return string
     */
    public function username()
    {
        return backpack_authentication_column();
    }

    /**
     * The user has logged out of the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect(route('home'));
    }

    /**
     * Get the guard to be used during logout.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return backpack_auth();
    }

    /**
     * Redirect the user to the authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        config(['services.' . $provider . '.redirect' => route('login.provider.callback', ['provider' => $provider])]);
        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            return redirect(route('backpack.auth.login') . '/#')->with('flash', [
                'text' => 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }
    }

    /**
     * Obtain the user information.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        config(['services.' . $provider . '.redirect' => route('login.provider.callback', ['provider' => $provider])]);

        try {
            $provider_user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect(route('backpack.auth.login') . '/#')->with('flash', [
                'text' => 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }

        if (null !== $provider_user->getEmail()) {
            $user = User::whereEmail($provider_user->getEmail())->first();
            if ($user !== null) {
                $this->guard()->login($user, true);
                return redirect(route('home') . '/#');
            }
        }

        return redirect(route('backpack.auth.login') . '/#')->with('flash', [
            'text' => 'El usuario de ' . $provider . ' no está registrado en ' . env('APP_NAME') . '.',
            'type' => 'danger',
            'icon' => 'la-exclamation',
            'action_label' => 'Registrarme',
            'action_url' => route('backpack.auth.register')
        ]);
    }
}
