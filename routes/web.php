<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
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
//Rutas de las vistas del cliente
//Ruta de inicio de clientes
Route::post('/bookings/index', [
    BookingController::class, 'index'
])->middleware(['auth', 'verified'])->name('bookings');

//Ruta de RoomBooking
Route::post('/roomBookings/index/', [
    BookingController::class, 'mostrarBookingRooms'
])->middleware(['auth', 'verified'])->name('roomBookings.list');

//Ruta de Rooms
Route::post('/rooms/available/', [
    RoomController::class, 'checkAvailableRooms'
])->middleware(['auth', 'verified'])->name('rooms.available_rooms');

Route::post('/rooms/show/', [
    RoomController::class, 'show'
])->middleware(['auth', 'verified'])->name('rooms.mostrar_habitacion');

Route::post('/roomBookings/autoCreate/', [
    BookingController::class, 'createAndInsertBookingRoom'
])->middleware(['auth', 'verified'])->name('rooms.auto_create_assignment');

Route::post('/roomBookings/autoCreateWithId/', [
    BookingController::class, 'insertBookingRoom'
])->middleware(['auth', 'verified'])->name('rooms.auto_create_assignment_with_id');

Route::post('/rooms/filter/', [
    RoomController::class, 'filter'
])->middleware(['auth', 'verified'])->name('rooms.filter_create');

Route::post('/rooms/filter-with-id/', [
    RoomController::class, 'filterWithId'
])->middleware(['auth', 'verified'])->name('rooms.filter_add');

Route::post('/roomBookings/show/', [
    BookingController::class, 'mostrarBookingRoom'
])->middleware(['auth', 'verified'])->name('roomBookings.mostrar');

Route::post('/roomBookings/eliminate/', [
    BookingController::class, 'removeBookingRoom'
])->middleware(['auth', 'verified'])->name('roomBookings.eliminate');

Route::get('/logout/', [
    AuthenticatedSessionController::class, 'destroy'
])->middleware(['auth', 'verified'])->name('user.logout');

//Ruta de vuelta a clientHome
Route::middleware('auth')->group(callback: function () {


    Route::get('/clientHome/', [
        ClientController::class, 'comprobarAutorizacion'
    ])->name('client_home');

    Route::resource('bookings', BookingController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('rooms', RoomController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
