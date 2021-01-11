<?php

use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/qr/{token}', [PageController::class, 'qr'])->name('qr'); // si3u1
Route::get('/producto/{slug}', [PageController::class, 'product'])->name('product'); // si3u1

/*
|--------------------------------------------------------------------------
| Logged Web Routes
|--------------------------------------------------------------------------
|
*/

Route::group([
    'middleware' => 'auth',
    'prefix'     => 'profile',
], function () {
    // Profile
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/order/{order_number}', [ProfileController::class, 'order'])->name('profile.order');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/payment', [CheckoutController::class, 'initPayment'])->name('checkout.payment.init');
    Route::get('/checkout/payment/{order_number}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::get('/checkout/payment/{type}/{order_number}', [CheckoutController::class, 'paymentResponse'])->name('chechout.payment.response')->where('type', 'success|failure');
    Route::post('/', [ProfileController::class, 'updateInfo'])->name('profile.update');
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('/qr-error/{error}', [PageController::class, 'qrError'])->name('qr.error')->where('error', 'already_used|expired|failed|deactivated|out_of_stock|doesnt_exist');
    Route::get('/qr-success/{token}', [PageController::class, 'qrSuccess'])->name('qr.success');
});


/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
