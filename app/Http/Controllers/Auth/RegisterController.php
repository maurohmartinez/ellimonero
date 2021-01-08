<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Backpack\CRUD\app\Library\Auth\RegistersUsers;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Traits\HandleQrResponse;

class RegisterController extends Controller
{
    protected $data = []; // the information we send to the view

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers, HandleQrResponse;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Redirect if logged
        if(Auth::check()){
            return redirect(route('home'));
        }

        $guard = backpack_guard_name();

        $this->middleware("guest:$guard");

        // Where to redirect users after login / registration.
        $this->redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo
            : config('backpack.base.route_prefix', 'dashboard');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();
        $users_table = $user->getTable();

        return Validator::make($data, [
            'name'              => 'required|max:255',
            'email'             => 'required|email|max:255|confirmed|unique:' . $users_table,
            'password'          => 'required|min:6|confirmed|max:12'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();

        return $user->create([
            'name'          => ucwords($data['name']),
            'email'         => $data['email'],
            'password'      => bcrypt($data['password'])
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        // if registration is closed, deny access
        if (!config('backpack.base.registration_open')) {
            abort(403, trans('backpack::base.registration_closed'));
        }

        $this->data['title'] = trans('backpack::base.register'); // set the page title

        return view(backpack_view('auth.register'), $this->data);
    }

    /**
     * Handle a registration request for the application. TRADICTIONAL
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // if registration is closed, deny access
        if (!config('backpack.base.registration_open')) {
            abort(403, trans('backpack::base.registration_closed'));
        }

        // Validate
        $this->validator($request->all())->validate();

        // Create
        $user = $this->create($request->all());

        // Register Event
        event(new Registered($user));

        // Login
        $this->guard()->login($user);
        
        // Handle QR
        return $this->handleQrSession();
    }

    /**
     * Get the guard to be used during registration.
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
        config(['services.' . $provider . '.redirect' => route('register.provider.callback', ['provider' => $provider])]);
        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            return redirect(route('backpack.auth.register') . '/#')->with('flash', [
                'text' => 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }
    }

    /**
     * Register user by social network.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        config(['services.' . $provider . '.redirect' => route('register.provider.callback', ['provider' => $provider])]);

        try {
            $provider_user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect(route('backpack.auth.register') . '/#')->with('flash', [
                'text' => 'Ocurrió un error y no pudimos completar la operación. Por favor, intentá nuevamente o contactate con nosotros si el error persiste.',
                'type' => 'danger',
                'icon' => 'la-exclamation'
            ]);
        }

        // check if user exists
        if (User::whereEmail($provider_user->getEmail())->exists()) {
            return redirect(route('backpack.auth.register') . '/#')->with('flash', [
                'text' => 'El usuario de ' . $provider . ' ya posee una cuenta en ' . env('APP_NAME') . '.',
                'type' => 'danger',
                'icon' => 'la-exclamation',
                'action_label' => 'Ingresar',
                'action_url' => route('backpack.auth.login')
            ]);
        }

        $data = [
            'email' => $provider_user->getEmail(),
            'name' => $provider_user->getName(),
            'password' => Str::random(12)
        ];

        // Create
        $user = $this->create($data);

        // Register Event
        event(new Registered($user));

        // Login
        $this->guard()->login($user);
        
        // Handle QR
        return $this->handleQrSession('/#');
    }
}
