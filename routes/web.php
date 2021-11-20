<?php

use App\Http\Controllers\PaypalController;
use App\Http\Livewire\Shop\Cart\IndexComponent as CartIndexComponent;
use App\Http\Livewire\Shop\CheckoutComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Shop\IndexComponent;
use App\PaypalCheckout;

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

/* Route::get('/', function () {
    return view('front.index');
}); */

Route::get('/', IndexComponent::class)->name('shop.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cart', CartIndexComponent::class )->name('cart');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

Route::get('paypal-checkout/{order}',[PaypalController::class,'getExpressCheckout'])
->name('paypal.checkout');
Route::get('paypal-success/{order}',[PaypalController::class,'getExpressCheckoutSuccess'])
->name('paypal.success');
Route::get('paypal-cancel',[PaypalController::class,'cancelPage'])
->name('paypal.cancel');
