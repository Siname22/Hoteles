<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::orderBy('codigo')->get();
        return view('paginas/clientes/rooms/index', compact('rooms'));
    }

    public function create()
    {
        return view('paginas/clientes/rooms/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'cogigo'        =>  'required',
            'nombre'        =>  'required',
            'tipo'          =>  'required',
            'estado'        =>  'required',
            'numero_camas'  =>  'required',
            'precio_base'   =>  'required',
            'max_ocupantes' =>  'required',
            'terraza'       =>  'required'
        ]);

        $room = new Room();
        $room->codigo = $request->codigo;
        $room->nombre = $request->codigo;
        $room->tipo = $request->codigo;
        $room->estado = $request->codigo;
        $room->numero_camas = $request->codigo;
        $room->precio_base = $request->precio_base;
        $room->max_ocupantes = $request->cmax_ocupantes;
        $room->terraza = $request->terraza;
    }

    public function show(Room $room)
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('id')->get();
        $params = [
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/clientes/rooms/show', compact('room','params'));
    }

    public function edit(Room $room)
    {
        return view('paginas/clientes/rooms/edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $this -> validate($request, [
            'id'            =>  'required',
            'codigo'        =>  'required',
            'nombre'        =>  'required',
            'tipo'          =>  'required',
            'estado'        =>  'required',
            'num_camas'     =>  'required',
            'precio_base'   =>  'required',
            'max_ocupantes' =>  'required',
            'terraza'       => ''
        ]);

        $room->id               =   $request->id;
        $room->codigo           =   $request->codigo;
        $room->nombre           =   $request->nombre;
        $room->tipo             =   $request->tipo;
        $room->estado           =   $request->estado;
        $room->num_camas        =   $request->num_camas;
        $room->precio_base      =   $request->precio_base;
        $room->max_ocupantes    =   $request->max_ocupantes;
        $room->terraza          =   $request->terraza ? True : False;
        $room->save();
        return redirect()->route('rooms.index');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }

    public function receive_params(Request $request, $id)
    {
        $this->validate($request, [
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required',
            'numero_camas'  =>  'required',
            'terraza'       =>  ''
        ]);

        $fechaEntrada   =   $request->fecha_entrada;
        $fechaSalida    =   $request->fecha_salida;
        $numeroCamas    =   $request->numero_camas;
        if (isset($request->terraza)) {
            $terraza = 1;
        } else {
            $terraza = 0;
        }

        $preParams = [$id, $fechaEntrada, $fechaSalida, $numeroCamas, $terraza];
        $params = implode(', ', $preParams);

        return redirect()->route('rooms.available_rooms', compact('params'));
    }
}
