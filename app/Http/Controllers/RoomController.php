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
        $room->estado = $request->codigo;
        $room->numero_camas = $request->codigo;
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
        //
    }

    public function update(Request $request, Room $room)
    {
        //
    }

    public function destroy(Room $room)
    {
        //
    }
}
