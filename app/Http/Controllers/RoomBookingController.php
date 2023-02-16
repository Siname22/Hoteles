<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;

class RoomBookingController extends Controller
{

    public function index()
    {
        return redirect(route('roomBookings'));
    }


    public function create()
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('id')->get();
        $params = [
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/roomBookings/create', compact('params'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $roomBooking = new RoomBooking();
        $roomBooking->room_id = $request->room_id;
        $roomBooking->booking_id = $request->booking_id;
        $roomBooking->fecha_entrada = $request->fecha_entrada;
        $roomBooking->fecha_salida = $request->fecha_salida;
        $roomBooking->save();

        $bookingId = $roomBooking->booking_id;
        return redirect()->route('roomBookings', compact('bookingId'));
    }


    public function show(RoomBooking $roomBooking)
    {
        return view('paginas/clientes/roomBookings/show', compact('roomBooking'));
    }


    public function edit(RoomBooking $roomBooking)
    {
        $rooms = Room::orderBy('codigo')->get();
        $bookings = Booking::orderBy('codigo')->get();
        $params = [
            'roomAssignment' => $roomBooking,
            'rooms' => $rooms,
            'bookings' => $bookings
        ];
        return view('paginas/roomBookings/edit', compact('params'));
    }


    public function update(Request $request, RoomBooking $roomBooking)
    {
        $this->validate($request, [
            'room_id'       =>  'required',
            'booking_id'     =>  'required',
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required'
        ]);

        $roomBooking->room_id = $request->room_id;
        $roomBooking->booking_id = $request->booking_id;
        $roomBooking->fecha_entrada = $request->fecha_entrada;
        $roomBooking->fecha_salida = $request->fecha_salida;
        $roomBooking->save();
        $bookingId =  $roomBooking->booking_id;
        return redirect()->route('roomBookings', compact('bookingId'));
    }


    public function destroy(RoomBooking $roomBooking)
    {
        $roomBooking->delete();
        $bookingId =  $roomBooking->booking_id;
        return redirect()->route('roomBookings', compact('bookingId'));
    }
}
