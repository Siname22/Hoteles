<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomAssignmentController;
use App\Http\Controllers\RoomController;
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

//Ruta de inicio de clientes
Route::get('/inicio', function () {
    $client = (array) DB::table('clients')->where('user_id', auth()->id())->first();

    $bookings = DB::table('bookings')->where('client_id', $client["id"])->get();

    return view('paginas/bookings/index', compact('bookings', 'client'));
})->middleware(['auth', 'verified'])->name('bookings');

//Ruta de RoomAssignment
Route::get('/roomAssignments{bookingId}', function ($bookingId) {
    $roomAssignments = DB::table('room_assignments')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
        ->select('room_assignments.*', 'rooms.nombre')
        ->where('booking_id', $bookingId)->get();

    return view('paginas/roomAssignments/index', compact('roomAssignments'));
})->middleware(['auth', 'verified'])->name('roomAssignments');

//Ruta de vuelta a clientHome
Route::middleware('auth')->group(callback: function () {
    Route::get('/', function () {
        return view('paginas/clientHome/clientHome');
    });

    Route::get('/clientHome', function () {
        return view('paginas/clientHome/clientHome');
    });

    Route::resource('roomAssignments', RoomAssignmentController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('rooms', RoomController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
