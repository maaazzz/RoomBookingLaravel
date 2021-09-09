<?php

use App\models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Admin Group&NameSpace
Route::namespace('Admin')->prefix('admin')->middleware(['auth','AdminMiddleware'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    // user routes
    Route::resource('/user', 'UserController');
    Route::get('/user/destroy/{user}', 'UserController@destroy')->name('user.destroy');
    // category routes
    Route::resource('/category', 'CategoryController');
    Route::get('/category/destroy/{category}', 'CategoryController@destroy')->name('category.destroy');
    // rooms routes
    Route::resource('/room', 'RoomController');
    Route::get('/room/destroy/{room}', 'RoomController@destroy')->name('room.destroy');
    // rooms routes
    Route::resource('/booking', 'BookingController');

    //feedback admin routes
    Route::get('/feedback', function () {
        $feedbacks = Feedback::latest()->paginate(10);
        return view('admin.feedback.index',compact('feedbacks'));
    })->name('feedback.index');
});

// frontend routes
Route::group(['namespace' => 'Frontend'],function () {
    Route::get('/','IndexController@index')->name('index');
    Route::get('/room-detail/{room}','IndexController@roomDetails')->name('room.detail');
    Route::get('/feedback','IndexController@feedback')->name('feedback');
    Route::post('/feedback/store','IndexController@storeFeedback')->name('feedback.store');
    Route::get('/search','IndexController@search')->name('search');
    Route::get('/details',function(){
        return view('front-end.pages.details');
    })->name('details');
});

// payment routes paypal + stripe
Route::middleware(['auth'])->namespace('Frontend')->group(function () {
    Route::get('/select-checkout-method/{room}','CheckoutController@index')->name('select.checkout.payment');
    Route::post('/paypal','CheckoutController@payWithPaypal')->name('paypal'); //paypal
    Route::get('/paypal','CheckoutController@getPaymentStatus')->name('status'); //paypal
    Route::post('/stripe','CheckoutController@postPaymentStripe')->name('stripe.charge'); //stripe

});

Route::middleware(['auth'])->namespace('Frontend')->group(function () {
    Route::resource('/user-profile','UserProfileController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
