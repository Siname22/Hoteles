<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EmployeeController;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Room;
use App\Models\RoomBooking;
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

Route::get('employee',function (){
    return view('paginas/empleados/gestionarEmpleados/index');
})->middleware(['auth', 'verified'])->name('employees');

Route::get('employeeList',function (){
    $employees = DB::table('employees')->get();
    return view('paginas/empleados/employees/index', compact('employees'));
})->middleware(['auth', 'verified'])->name('employeeList');

Route::get('createEmployee',function (){
    $employees = DB::table('employees')->get();
    return view('paginas/empleados/employees/create', compact('employees'));
})->middleware(['auth', 'verified'])->name('createEmployee');

Route::get('editEmployee',function (){
    $employees = DB::table('employees')->get();
    return view('paginas/empleados/employees/edit', compact('employees'));
})->middleware(['auth', 'verified'])->name('editEmployee');


// Ruta Index de Habitaciones (Empleados)  23-2-23

Route::get('roomsList',function (){
    return view('paginas/clientes/rooms/roomIndex');
})->middleware(['auth', 'verified'])->name('roomsList');



//Rutas de las vistas del cliente
//Ruta de inicio de clientes
Route::get('/inicio', function () {
    $client = (array) DB::table('clients')->where('user_id', auth()->id())->first();

    $bookings = DB::table('bookings')->where('client_id', $client["id"])->get();

    return view('paginas/clientes/bookings/index', compact('bookings', 'client'));
})->middleware(['auth', 'verified'])->name('bookings');

//Ruta de RoomBooking
Route::get('/roomBookings{bookingId}', function ($bookingId) {
    $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
        ->select('room_bookings.*', 'rooms.nombre')
        ->where('booking_id', $bookingId)->get();
    $params = [$roomBookings, $bookingId];
    return view('paginas/clientes/roomBookings/index', compact('params'));
})->middleware(['auth', 'verified'])->name('roomBookings');

//Ruta de Rooms
Route::get('/rooms/available{params}', [
    RoomController::class, 'checkAvailableRooms'
])->middleware(['auth', 'verified'])->name('rooms.available_rooms');

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
    $roomBooking = new RoomBooking();
    $roomBooking->room_id = $paramsArray[5];
    $roomBooking->booking_id = $paramsArray[0];
    $roomBooking->fecha_entrada = $paramsArray[1];
    $roomBooking->fecha_salida = $paramsArray[2];
    $roomBooking->save();
    $bookingId = $paramsArray[0];
    return redirect()->route('roomBookings', compact('bookingId'));
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

Route::get('/roomBookings/return{id}', function($id){
    $roomBooking = RoomBooking::select('*')->where('id', '=', DB::raw($id))->first();
    $bookingId = $roomBooking->booking_id;
    return redirect()->route('roomBookings', compact('bookingId'));
})->middleware(['auth', 'verified'])->name('roomBookings.returnToIndex');

//Ruta de vuelta a clientHome
Route::middleware('auth')->group(callback: function () {
    Route::get('/', function () {
        switch (auth()->user()->comprobarAutorizacion(auth()->id())) {
            case "Administrador":
                $rol = "Administrador";
                return view('paginas/empleados/empleadoHome/empleadoHome', compact('rol'));
            case "Recepcion":
                $rol = "Recepcion";
                return view('paginas/empleados/empleadoHome/empleadoHome', compact('rol'));
            case "RRHH":
                $rol = "RRHH";
                return view('paginas/empleados/empleadoHome/empleadoHome', compact('rol'));
            default:
                return view('paginas/clientes/clientHome/clientHome');
        }
    });

    Route::get('/clientHome', function () {
        return view('paginas/clientes/clientHome/clientHome');
    });

    Route::resource('roomBookings', RoomBookingController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('employees', EmployeeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
