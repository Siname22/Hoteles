<?php

namespace App\Http\Controllers;

use App\Models\RoomAssignment;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class RoomAssignmentController extends Controller
{

    public function index()
    {
        return redirect(route('roomAssignments'));
    }


    public function create()
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('id')->get();
        $params = [
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/roomAssignments/create', compact('params'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $roomAssignment = new RoomAssignment();
        $roomAssignment->room_id = $request->room_id;
        $roomAssignment->booking_id = $request->booking_id;
        $roomAssignment->fecha_entrada = $request->fecha_entrada;
        $roomAssignment->fecha_salida = $request->fecha_salida;
        $roomAssignment->save();

        $bookingId = $roomAssignment->booking_id;
        return redirect()->route('roomAssignments', compact('bookingId'));
    }


    public function show(RoomAssignment $roomAssignment)
    {
        return view('paginas/clientes/roomAssignments/show', compact('roomAssignment'));
    }


    public function edit(RoomAssignment $roomAssignment)
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('codigo')->get();
        $params = [
            'roomAssignment' => $roomAssignment,
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/roomAssignments/edit', compact('params'));
    }


    public function update(Request $request, RoomAssignment $roomAssignment)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $roomAssignment->room_id = $request->room_id;
        $roomAssignment->booking_id = $request->booking_id;
        $roomAssignment->fecha_entrada = $request->fecha_entrada;
        $roomAssignment->fecha_salida = $request->fecha_salida;
        $roomAssignment->save();
        $bookingId =  $roomAssignment->booking_id;
        return redirect()->route('roomAssignments', compact('bookingId'));
    }


    public function destroy(RoomAssignment $roomAssignment)
    {
        $roomAssignment->delete();
        $bookingId =  $roomAssignment->booking_id;
        return redirect()->route('roomAssignments', compact('bookingId'));
    }
}
