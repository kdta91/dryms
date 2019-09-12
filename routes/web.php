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
use App\Http\Middleware\Superadmin;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

/**
 * Admin Routes
 */
Route::get('/admin', 'Admin\DashboardController@index');

// rooms
Route::get('/admin/rooms', 'Admin\RoomController@index');
Route::get('/admin/rooms/data', 'Admin\RoomController@getRooms')->name('rooms.data'); // datatable
Route::post('/admin/rooms', 'Admin\RoomController@store');
Route::get('/admin/rooms/create', 'Admin\RoomController@create');
Route::get('/admin/rooms/{room}', 'Admin\RoomController@show');
Route::patch('/admin/rooms/{room}', 'Admin\RoomController@update');
Route::delete('/admin/rooms/{room}', 'Admin\RoomController@destroy');
Route::get('/admin/rooms/{room}/edit', 'Admin\RoomController@edit');

// bookings
Route::get('/admin/bookings/exportToCsv', 'Admin\BookingController@exportToCsv');
Route::get('/admin/bookings', 'Admin\BookingController@index');
Route::get('/admin/bookings/data', 'Admin\BookingController@getBookings')->name('bookings.data'); // datatable
Route::post('/admin/bookings', 'Admin\BookingController@store');
Route::get('/admin/bookings/create', 'Admin\BookingController@create');
Route::get('/admin/bookings/{booking}', 'Admin\BookingController@show');
Route::patch('/admin/bookings/{booking}', 'Admin\BookingController@update');
Route::delete('/admin/bookings/{booking}', 'Admin\BookingController@destroy');
Route::get('/admin/bookings/{booking}/edit', 'Admin\BookingController@edit');

// purchases
Route::get('/admin/purchases', 'Admin\PurchaseController@index');
Route::get('/admin/purchases/data', 'Admin\PurchaseController@getPurchases')->name('purchases.data'); // datatable
Route::post('/admin/purchases', 'Admin\PurchaseController@store');
Route::get('/admin/purchases/create', 'Admin\PurchaseController@create');
Route::get('/admin/purchases/{purchase}', 'Admin\PurchaseController@show');
Route::patch('/admin/purchases/{purchase}', 'Admin\PurchaseController@update');
Route::delete('/admin/purchases/{purchase}', 'Admin\PurchaseController@destroy');
Route::get('/admin/purchases/{purchase}/edit', 'Admin\PurchaseController@edit');

// receipts
Route::get('/admin/receipts', 'Admin\ReceiptController@index');
Route::get('/admin/receipts/data', 'Admin\ReceiptController@getReceipts')->name('receipts.data'); // datatable
Route::post('/admin/receipts', 'Admin\ReceiptController@store');
Route::get('/admin/receipts/create', 'Admin\ReceiptController@create');
Route::get('/admin/receipts/{receipt}', 'Admin\ReceiptController@show');
Route::patch('/admin/receipts/{receipt}', 'Admin\ReceiptController@update');
Route::delete('/admin/receipts/{receipt}', 'Admin\ReceiptController@destroy');
Route::get('/admin/receipts/{receipt}/edit', 'Admin\ReceiptController@edit');

// users
Route::get('/admin/users', 'Admin\UserController@index');
Route::post('/admin/users', 'Admin\UserController@store');
Route::get('/admin/users/create', 'Admin\UserController@create');
Route::get('/admin/users/{user}', 'Admin\UserController@show');
Route::patch('/admin/users/{user}', 'Admin\UserController@update');
Route::delete('/admin/users/{user}', 'Admin\UserController@destroy');
Route::get('/admin/users/{user}/edit', 'Admin\UserController@edit');

/**
 * User Routes
 */
// Route::post('/book', 'Customer\BookingController@store');
// Route::get('/book/{duration}/{adults}/{children}', 'Customer\BookingController@index');
// Route::get('/book/{duration}/{adults}/{children}/{room}', 'Customer\BookingController@show');
// Route::get('/book/create', 'Customer\BookingController@create');

Route::post('/search', 'Customer\BookingController@search');
Route::get('/search/rooms', 'Customer\BookingController@rooms')->middleware('checkdate');
Route::post('/search/rooms/book', 'Customer\BookingController@book');
Route::get('/search/checkout', 'Customer\BookingController@checkout')->middleware('checktotalpayment');
// Route::post('/search/checkout', 'Customer\BookingController@createPayment');
Route::post('/search/checkout', 'Customer\BookingController@store');