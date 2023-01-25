<?php

namespace App\Http\Controllers;

use App\Models\Room_booking;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class RoomBookingController extends Controller
{

    public function index()
    {
        $room_bookings = Room_booking::orderBy('room_id')->get();
        return view('paginas/room_bookings/index', compact('room_bookings'));
    }


    public function create()
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('id')->get();
        $params = [
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/room_bookings/create', compact('params'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $room_booking = new Room_booking();
        $room_booking->room_id = $request->room_id;
        $room_booking->booking_id = $request->booking_id;
        $room_booking->fecha_entrada = $request->fecha_entrada;
        $room_booking->fecha_salida = $request->fecha_salida;
        $room_booking->save();

        return redirect()->route('room_bookings.index');
    }


    public function show(Room_booking $room_booking)
    {
        return view('paginas/room_bookings/show', compact('room_booking'));
    }


    public function edit(Room_booking $room_booking)
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('codigo')->get();
        $params = [
            'room_booking' => $room_booking,
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/room_bookings/edit', compact('params'));
    }


    public function update(Request $request, Room_booking $room_booking)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $room_booking->room_id = $request->room_id;
        $room_booking->booking_id = $request->booking_id;
        $room_booking->fecha_entrada = $request->fecha_entrada;
        $room_booking->fecha_salida = $request->fecha_salida;
        $room_booking->save();

        return redirect()->route('room_bookings.index');
    }


    public function destroy(Room_booking $room_booking)
    {
        $room_booking->delete();
        return redirect()->route('bookings.index');
    }
}
