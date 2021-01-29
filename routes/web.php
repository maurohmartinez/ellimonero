<?php

use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/qr-home/{token}', [PageController::class, 'qr'])->name('qr'); // Sample: si3u1
Route::get('/qr/{token}', [PageController::class, 'qr']); // Sample: si3u1

// Cita con el amor
Route::get('/mundo-maxi', [PageController::class, 'mundoMaxi'])->name('mundo.maxi');
Route::get('/cita-con-el-amor', [PageController::class, 'cita'])->name('cita.con.el.amor');
Route::get('/rnf', [PageController::class, 'rnf'])->name('rnf');

Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/subasta', [PageController::class, 'subasta'])->name('subasta');
Route::post('/popup', [RegisterController::class, 'registerPopup'])->name('popup.register');

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
    Route::get('/boleteria', [ProfileController::class, 'tickets'])->name('profile.tickets');
    Route::get('/orders', [ProfileController::class, 'orders'])->name('profile.orders');
    Route::get('/order/{order_number}', [ProfileController::class, 'order'])->name('profile.order');
    Route::post('/', [ProfileController::class, 'updateInfo'])->name('profile.update');
    Route::post('/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::get('/qr-error/{error}', [PageController::class, 'qrError'])->name('qr.error')->where('error', 'already_used|expired|failed|deactivated|out_of_stock|doesnt_exist');
});

Route::group([
    'middleware' => 'auth'
], function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('/checkout/payment', [CheckoutController::class, 'initPayment'])->name('checkout.payment.init');
    Route::get('/checkout/payment/{order_number}', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::get('/checkout/payment/{type}/{order_number}', [CheckoutController::class, 'paymentResponse'])->name('chechout.payment.response')->where('type', 'success|failure');
    Route::get('/qr-success/{token}', [PageController::class, 'qrSuccess'])->name('qr.success');
    Route::get('/producto/{id}', [PageController::class, 'product'])->name('product');
});


/** CATCH-ALL ROUTE for Backpack/PageManager - needs to be at the end of your routes.php file  **/
Route::get('{page}/{subs?}', ['uses' => '\App\Http\Controllers\PageController@index'])
    ->where(['page' => '^(((?=(?!admin))(?=(?!\/)).))*$', 'subs' => '.*']);
