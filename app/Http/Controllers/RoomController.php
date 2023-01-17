<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = Room::orderBy('codigo')->get();
        return view('paginas/rooms/index', compact('rooms'));
    }

    public function create()
    {
        return view('paginas/rooms/create');
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
        $room->estado = $request->estado;
        $room->numero_camas = $request->numero_camas;
        $room->precio_base = $request->precio_base;
        $room->max_ocupantes = $request->cmax_ocupantes;
        $room->terraza = $request->terraza;
    }

    public function show(Room $room)
    {
        //
    }

    public function edit(Room $room)
    {
        return view('paginas/rooms/edit', compact('room'));
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
        return redirect() -> route('rooms.index');
    }

    public function destroy(Room $room)
    {
        //
    }
}
