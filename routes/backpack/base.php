<?php

/*
|--------------------------------------------------------------------------
| Backpack\Base Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\Base package.
|
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::group(
    [
        'middleware' => 'web',
        'middleware' => config('backpack.base.web_middleware', 'web'),
        'prefix'     => config('backpack.base.route_prefix'),
    ],
    function () {

        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('backpack.auth.login');
        Route::post('', [LoginController::class, 'customLogin']);
        // Facebook login
        Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider')->where('provider', 'facebook|instagram|google|twitter');
        Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.provider.callback')->where('provider', 'facebook|instagram|google|twitter');

        Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('backpack.auth.register');
        Route::post('register', [RegisterController::class, 'register']);
        // Facebook register
        Route::get('register/{provider}', [RegisterController::class, 'redirectToProvider'])->name('register.provider')->where('provider', 'facebook|instagram|google|twitter');
        Route::get('register/{provider}/callback', [RegisterController::class, 'handleProviderCallback'])->name('register.provider.callback')->where('provider', 'facebook|instagram|google|twitter');
    }
);

Route::group(
    [
        'namespace'  => 'Backpack\CRUD\app\Http\Controllers',
        'middleware' => config('backpack.base.web_middleware', 'web'),
        'prefix'     => config('backpack.base.route_prefix'),
    ],
    function () {
        Route::get('logout', 'Auth\LoginController@logout')->name('backpack.auth.logout');
        Route::post('logout', 'Auth\LoginController@logout');
        
        // if not otherwise configured, setup the dashboard routes
        if (config('backpack.base.setup_dashboard_routes')) {
            Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
            Route::get('/', 'AdminController@redirect')->name('backpack');
        }

        // if not otherwise configured, setup the "my account" routes
        if (config('backpack.base.setup_my_account_routes')) {
            Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('backpack.account.info');
            Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm')->name('backpack.account.info.store');
            Route::post('change-password', 'MyAccountController@postChangePasswordForm')->name('backpack.account.password');
        }

        // if not otherwise configured, setup the password recovery routes
        if (config('backpack.base.setup_password_recovery_routes', true)) {
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('backpack.auth.password.reset');
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('backpack.auth.password.reset.token');
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('backpack.auth.password.email');
        }
    }
);