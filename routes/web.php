<?php

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

Route::get('/', 'WelcomeController@index');
Route::get('about-us', 'WelcomeController@about')->name('about-us');
Route::get('contact-us', 'ContactController@index')->name('contact-us');
Route::post('contact', 'ContactController@store')->name('contact');
Route::get('hotels', 'HotelController@index')->name('hotels');
Route::get('hotels/{hotel}', 'HotelController@show')->name('hotels.show');
Route::get('hotel', 'HotelController@show')->name('hotel.show');
Route::get('search', 'WelcomeController@search')->name('search');
Route::post('search-results', 'WelcomeController@filter')->name('search-results');

Route::get('cart', 'BookingController@booking')->name('cart');
Route::get('book-room/{id}', 'BookingController@addToCart')->name('book-room');
Route::get('remove-room/{id}', 'BookingController@removeFromCart')->name('remove-room');
Route::get('clear-booking', 'BookingController@deleteFromCart')->name('clear-booking');
Route::get('stripe-payment', 'StripeController@index')->name('stripe-payment');
Route::post('stripe-payment', 'StripeController@save')->name('stripe-payment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/settings/security', function () {
    // Users must confirm their password before continuing...
})->middleware(['auth', 'password.confirm']);

//Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard')->middleware('checkRole:admin', 'auth');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('users', 'UsersController@index')->name('users')->middleware('checkRole:admin');
    Route::get('user/edit-user/{user}', 'UsersController@edit')->name('edit-user')->middleware('checkRole:admin');
    Route::get('user/{user}/view', 'UsersController@show')->name('user-view');
    Route::post('user/{user}', 'UsersController@store')->name('save-user-profile');
    Route::get('user/{user}/delete', 'UsersController@destroy')->name('delete');
    Route::get('user/add-role/{user}', 'UsersController@addRoles')->name('add-role')->middleware('checkRole:admin');
    Route::post('user/assign-role/{user}', 'UsersController@assignRoles')->name('assign-role')->middleware('checkRole:admin');
    Route::get('user/remove-role/{user}', 'UsersController@removeRoles')->name('remove-role')->middleware('checkRole:admin');
    Route::post('user/refuse-role/{user}', 'UsersController@refuseRoles')->name('refuse-role')->middleware('checkRole:admin');

    Route::get('dashboard', 'DashboardController@index')->name('dashboard')->middleware('checkRole:admin', 'auth');
    Route::get('profile/{id}', 'ShowProfile')->name('profile');

    Route::resource('hotels', 'HotelController')->middleware('checkRole:admin');
    Route::resource('rooms', 'RoomController')->middleware('checkRole:admin');
    Route::resource('room-categories', 'RoomCategoryController')->middleware('checkRole:admin');
    Route::resource('room-types', 'RoomTypeController')->middleware('checkRole:admin');

});
