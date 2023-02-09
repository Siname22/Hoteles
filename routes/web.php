<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomAssignmentController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use App\Models\RoomAssignment;
use Carbon\Carbon;
use Illuminate\HTTP\Request;
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


Route::get('/rooms/available{params}', function($params) {

    $arrParams = explode(', ', $params);

    $fechaEntrada   =   $arrParams[0];
    $fechaSalida    =   $arrParams[1];
    $numeroCamas    =   $arrParams[2];
    $terraza        =   $arrParams[3];

    $roomsListadas = Room::select('*')
        ->where('rooms.numero_camas','>=',DB::raw($numeroCamas))
        ->where('rooms.terraza','=',DB::raw($terraza))
        ->where('rooms.estado','LIKE', DB::raw('\'disp\''))->get();

    $roomsFuera = RoomAssignment::select('*')
        ->where(DB::raw(0), '<=', DB::raw('(SELECT DATEDIFF(`room_assignments`.`fecha_entrada`, '."'".Carbon::parse($fechaEntrada)->toDateString()."'".'))'))
        ->where(DB::raw(0), '>=', DB::raw('(SELECT DATEDIFF(`room_assignments`.`fecha_salida`, '."'".Carbon::parse($fechaSalida)->toDateString()."'".'))'))
        ->get();

    $roomsEntradaDentro = RoomAssignment::select('*')
        ->where(DB::raw(0), '<=', DB::raw('(SELECT DATEDIFF(room_assignments.fecha_entrada, '."'".Carbon::parse($fechaEntrada)->toDateString()."'".'))'))
        ->where(DB::raw(0), '>', DB::raw('(SELECT DATEDIFF(room_assignments.fecha_salida, '."'".Carbon::parse($fechaEntrada)->toDateString()."'".'))'))
        ->get();

    $roomsSalidaDentro = RoomAssignment::select('*')
        ->where(DB::raw(0), '<', DB::raw('(SELECT DATEDIFF(room_assignments.fecha_entrada, '."'".Carbon::parse($fechaSalida)->toDateString()."'".'))'))
        ->where(DB::raw(0), '>=', DB::raw('(SELECT DATEDIFF(room_assignments.fecha_salida, '."'".Carbon::parse($fechaSalida)->toDateString()."'".'))'))
        ->get();

    $availableRooms = [];

    foreach ($roomsListadas as $roomListada) {

        $ocupada = false;

        foreach ($roomsFuera as $roomFuera) {

            if ($roomListada->id == $roomFuera->room_id) {
                $ocupada = true;
            }

        }

        foreach ($roomsEntradaDentro as $roomEntradaDentro) {

            if ($roomListada->id == $roomEntradaDentro->room_id) {
                $ocupada = true;
            }

        }

        foreach ($roomsSalidaDentro as $roomSalidaDentro) {

            if ($roomListada->id == $roomSalidaDentro->room_id) {
                $ocupada = true;
            }

        }

        if (!$ocupada) {
            $availableRooms[] = $roomListada;
        }

    }

    return view('paginas/rooms/index', compact('availableRooms'));
})->middleware(['auth', 'verified'])->name('rooms.available_rooms');

Route::get('/recibir/params', [
    RoomController::class, 'receive_params'
])->middleware(['auth', 'verified'])->name('rooms.receive_params');

Route::get('/rooms/filter', function() {
    return view('paginas/rooms/filter');
})->middleware(['auth', 'verified'])->name('rooms.filter');

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
