<?php

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

Route::get('/', function () {
    return view('paginas/inicio/inicio');
});
Route::get('/login', function () {
    return view('paginas/inicio/login');
});
Route::get('/sign_up', function () {
    return view('paginas/inicio/sign_up');
});

Route::resource('room_bookings', \App\Http\Controllers\RoomBookingController::class);
Route::resource('bookings', \App\Http\Controllers\BookingController::class);
Route::resource('clients', \App\Http\Controllers\ClientController::class);
Route::resource('rooms', \App\Http\Controllers\RoomController::class);
