<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomAssignmentController;
use App\Http\Controllers\RoomController;
use App\Models\Booking;
use App\Models\Client;
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
//Rutas de las vistas de los empleados
//Ruta de inicio
Route::get('/inicio/empleados', function (){
    $employee = (array) DB::table('employees')->where('user_id',auth()->id()->first());
    return view('paginas/empleados/empleadoHome', compact('employee'));
});
//Rutas de las vistas del cliente
//Ruta de inicio de clientes
Route::get('/inicio', function () {
    $client = (array) DB::table('clients')->where('user_id', auth()->id())->first();

    $bookings = DB::table('bookings')->where('client_id', $client["id"])->get();

    return view('paginas/clientes/bookings/index', compact('bookings', 'client'));
})->middleware(['auth', 'verified'])->name('bookings');

//Ruta de RoomAssignment
Route::get('/roomAssignments{bookingId}', function ($bookingId) {
    $roomAssignments = DB::table('room_assignments')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
        ->select('room_assignments.*', 'rooms.nombre')
        ->where('booking_id', $bookingId)->get();
    $params = [$roomAssignments, $bookingId];
    return view('paginas/clientes/roomAssignments/index', compact('params'));
})->middleware(['auth', 'verified'])->name('roomAssignments');


Route::get('/rooms/available{params}', function($params) {

    $arrParams = explode(', ', $params);

    $fechaEntrada   =   $arrParams[1];
    $fechaSalida    =   $arrParams[2];
    $numeroCamas    =   $arrParams[3];
    $terraza        =   $arrParams[4];

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

    $prms = [$params, $availableRooms];

    return view('paginas/clientes/rooms/index', compact('prms'));
})->middleware(['auth', 'verified'])->name('rooms.available_rooms');

Route::get('/recibir/params{id}', [
    RoomController::class, 'receive_params'
])->middleware(['auth', 'verified'])->name('rooms.receive_params');

Route::get('/rooms/show{params}', function($params){
    $paramsInter = explode(", ", $params);
    $id = array_pop($paramsInter);
    $room = Room::select('*')
        ->where('id', '=', DB::raw($id))
        ->first();
    $prms = [implode(", ", $paramsInter), $room];
    return view('paginas/clientes/rooms/show', compact('prms'));
})->middleware(['auth', 'verified'])->name('rooms.mostrar_habitacion');

Route::get('/rooms/create{paramsCreate}', function($paramsCreate){
    $paramsArray = explode(", ", $paramsCreate);
    $roomAssignment = new RoomAssignment();
    $roomAssignment->room_id = $paramsArray[5];
    $roomAssignment->booking_id = $paramsArray[0];
    $roomAssignment->fecha_entrada = $paramsArray[1];
    $roomAssignment->fecha_salida = $paramsArray[2];
    $roomAssignment->save();
    $bookingId = $paramsArray[0];
    return redirect()->route('roomAssignments', compact('bookingId'));
})->middleware(['auth', 'verified'])->name('rooms.auto_create_assignment');

Route::get('/rooms/filter{id}', function($id) {
    return view('paginas/clientes/rooms/filter', compact('id'));
})->middleware(['auth', 'verified'])->name('rooms.filter');

Route::get('/bookings/auto/create', function(){
    $client = Client::select('*')->where('id', '=', DB::raw(auth()->id()))->first();
    $id = DB::table('bookings')->insertGetId([
        'precio'        =>  250.0,
        'observacion'   =>  "reserva realizada",
        'client_id'     =>  $client->id
    ]);
    return redirect()->route('rooms.filter', compact('id'));
})->middleware(['auth', 'verified'])->name('bookings.auto_create');

Route::get('/roomAsignments/return{id}', function($id){
    $roomAssignment = RoomAssignment::select('*')->where('id', '=', DB::raw($id))->first();
    $bookingId = $roomAssignment->booking_id;
    return redirect()->route('roomAssignments', compact('bookingId'));
})->middleware(['auth', 'verified'])->name('roomAssignments.returnToIndex');

//Ruta de vuelta a clientHome
Route::middleware('auth')->group(callback: function () {
    Route::get('/', function () {
        return view('paginas/clientes/clientHome/clientHome');
    });

    Route::get('/clientHome', function () {
        return view('paginas/clientes/clientHome/clientHome');
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
