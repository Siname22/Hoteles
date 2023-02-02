<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

Route::get('/inicio', function () {
    $client = (array) DB::table('clients')->where('user_id', auth()->id())->first();
    $bookings = DB::table('bookings')->where('client_id', $client["id"])->get();
    return view('paginas/bookings/index', compact('bookings', 'client'));
})->middleware(['auth', 'verified'])->name('bookings');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('paginas/inicio_cliente/inicio_cliente');
    });
    Route::get('/login', function () {
        return view('paginas/inicio/login');
    });
    Route::get('/sign_up', function () {
        return view('paginas/inicio/sign_up');
    });
    Route::get('/inicio_cliente', function () {
        return view('paginas/inicio_cliente/inicio_cliente');
    });

    Route::resource('room_bookings', \App\Http\Controllers\RoomBookingController::class);
    Route::resource('bookings', \App\Http\Controllers\BookingController::class);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
    Route::resource('rooms', \App\Http\Controllers\RoomController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
