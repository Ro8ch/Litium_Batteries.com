<?php

use App\CountryVisit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('admin');

// Shop and welcome
Route::get('/', 'WelcomePageController@index')->name('welcome');
Route::get('/shop', 'ShopController@index')->name('shop.index');
Route::get('/shop/{product}', 'ShopController@show')->name('shop.show');
Route::get('/shop/search/{query}', 'ShopController@search')->name('shop.search');


// Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}/{cart}', 'CartController@destroy')->name('cart.destroy');
Route::post('/cart/save-later/{product}', 'CartController@saveLater')->name('cart.save-later');
Route::post('/cart/add-to-cart/{product}', 'CartController@addToCart')->name('cart.add-to-cart');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');

// checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
#Route::get('/eft', 'CheckoutController@eft')->name('checkout.eft');
#Route::post('/eft', function () {return view('eft');})->name('eft');
#Route::post('/eft', 'CheckoutController@eft')->name('checkout.eft');
#Route::get('/payfast', 'CheckoutController@store')->name('checkout.payfast');
#Route::post('/payfast', 'CheckoutController@store')->name('checkout.payfast');
Route::get('/guest-checkout', 'CheckoutController@index')->name('checkout.guest');

// Payment
Route::post('/eft', 'eftController@index')->name('eft.index');
Route::get('confirmpayment', 'PaymentController@confirmpayment')->name('confirmpayment');
Route::get('/payfast/success','PaymentController@success')->name('payment.success');
Route::get('/payfast/cancel','PaymentController@cancel')->name('payment.cancel');


// coupon
Route::post('/coupon', 'CouponsController@store')->name('coupon.store');
Route::delete('/coupon/', 'CouponsController@destroy')->name('coupon.destroy');

// auth routes
Auth::routes();
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// How to route
Route::get('/how_to', 'how_toController@index')->name('how_to.index');
//Terms and Conditions
Route::get('/terms', 'termsController@index')->name('terms.index');
// Home page
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/country_visits', 'VisitsController@index')->name('voyager.visits');
});
