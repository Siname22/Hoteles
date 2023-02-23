<?php

namespace App\Http\Controllers;

use App\Models\RoomBooking;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class RoomBookingController extends Controller
{

    public function index(Request $request)
    {
        $this->validate($request, [
            'bookingId' => 'required'
        ]);

        $bookingId = $request->bookingId;

        $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
            ->select('room_bookings.*', 'rooms.nombre')
            ->where('booking_id', $bookingId)->get();
        $params = [$roomBookings, $bookingId];
        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function list($bookingId)
    {
        $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
            ->select('room_bookings.*', 'rooms.nombre')
            ->where('booking_id', $bookingId)->get();
        $params = [$roomBookings, $bookingId];
        return view('paginas/clientes/roomBookings/index', compact('params'));
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


    public function show(Request $request)
    {
        $this->validate($request, [
            'roomBookingId' => 'required'
        ]);

        $id = $request->roomBookingId;

        $roomBooking = RoomBooking::select('*')->where('id', '=', DB::raw($id))->first();
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
        $bookingId = $roomBooking->booking_id;
        $roomBooking->delete();
        return redirect()->route('roomBookings.list', compact('bookingId'));
    }

    public function eliminate(Request $request)
    {
        $this->validate($request, [
            'roomBookingId' =>  'required',
            'bookingId'     =>  'required'
        ]);
        $roomBookingId = $request->roomBookingId;
        $roomBooking = RoomBooking::select('*')->where('id', '=', DB::raw($roomBookingId))->first();

        $roomBooking->delete();
        $bookingId = $request->bookingId;

        $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
            ->select('room_bookings.*', 'rooms.nombre')
            ->where('booking_id', $bookingId)->get();

        $params = [$roomBookings, $bookingId];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function autoCreate(Request $request)
    {
        $this->validate($request, [
            'fechaEntrada'  =>  'required',
            'fechaSalida'   =>  'required',
            'roomId'        =>  'required',
            'bookingId'     =>  'required'
        ]);

        $roomBooking = new RoomBooking();
        $roomBooking->room_id = $request->roomId;
        $roomBooking->booking_id = $request->bookingId;
        $roomBooking->fecha_entrada = $request->fechaEntrada;
        $roomBooking->fecha_salida = $request->fechaSalida;
        $roomBooking->save();

        $bookingId = $request->bookingId;

        $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
            ->select('room_bookings.*', 'rooms.nombre')
            ->where('booking_id', $bookingId)->get();

        $params = [$roomBookings, $bookingId];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function autoCreateSumandoId($data)
    {
        $params = explode(", ", $data);

        $roomBooking = new RoomBooking();
        $roomBooking->room_id = $params[2];
        $roomBooking->booking_id = $params[3];
        $roomBooking->fecha_entrada = $params[0];
        $roomBooking->fecha_salida = $params[1];
        $roomBooking->save();

        $bookingId = $params[3];

        $roomBookings = DB::table('room_bookings')->join('rooms', 'room_id', 'LIKE', 'rooms.id')
            ->select('room_bookings.*', 'rooms.nombre')
            ->where('booking_id', $bookingId)->get();

        $params = [$roomBookings, $bookingId];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }
}
