<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index()
    {
        $client = (array) DB::table('clients')->where('user_id', auth()->id())->first();

        $bookings = DB::table('bookings')->where('client_id', $client["id"])->get();

        return view('paginas/clientes/bookings/index', compact('bookings', 'client'));
    }

    public function create()
    {
        $clients = Client::orderBy('nombre')->get();
        return view('paginas/bookings/create', compact('clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'codigo'        =>  'required',
            'precio'        =>  'required',
            'observacion'   =>  'required',
            'client_id'     =>  'required',
        ]);

        $booking                =   new Booking();
        $booking->codigo        =   $request->codigo;
        $booking->precio        =   $request->precio;
        $booking->observacion   =   $request->observacion;
        $booking->client_id     =   $request->client_id;
        $booking->save();

        return redirect()->route('bookings.index');
    }

    public function show(Booking $booking)
    {
        return view('paginas/bookings/show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $clients = Client::orderBy('nombre')->get();
        return view('paginas/bookings/edit', compact('booking', 'clients'));
    }

    public function update(Request $request, Booking $booking)
    {
        $this -> validate($request, [
            'codigo'        =>  'required',
            'precio'        =>  'required',
            'observaciones' =>  'required',
            'client_id'     =>  'required'
        ]);

        $booking->codigo         =   $request->codigo;
        $booking->precio        =   $request->precio;
        $booking->observaciones =   $request->observaciones;
        $booking->client_id     =   $request->client_id;
        $booking->save();

        return redirect() -> route('bookings.index');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index');
    }

    public function insertBookingRoom(Request $request)
    {
        $this->validate($request, [
            'fechaEntrada'  =>  'required',
            'fechaSalida'   =>  'required',
            'roomId'        =>  'required',
            'bookingId'     =>  'required'
        ]);

        $booking = Booking::find($request->bookingId);
        $booking->rooms()->attach($request->roomId, ['fecha_entrada' => $request->fechaEntrada,
            'fecha_salida' => $request->fechaSalida]);

        $roomBookings = [];
        foreach ($booking->rooms as $room) {
            $roomBookings[] = ['id' => $room->pivot->id,'nombre' => $room->nombre, 'room_id' => $room->pivot->room_id,
                'fecha_entrada' => $room->pivot->fecha_entrada, 'fecha_salida' => $room->pivot->fecha_salida];
        }
        $params = [$roomBookings, $request->bookingId];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function createAndInsertBookingRoom(Request $request)
    {
        $this->validate($request, [
            'fechaEntrada'  =>  'required',
            'fechaSalida'   =>  'required',
            'roomId'        =>  'required'
        ]);

        $cliente = Client::select('*')->where('user_id', '=', DB::raw(auth()->id()))->first();

        $id = DB::table('bookings')->insertGetId([
            'precio' => '250',
            'observacion' => 'Reserva realizada',
            'client_id' => $cliente->id
        ]);

        $booking = Booking::find($id);
        $booking->rooms()->attach($request->roomId, ['fecha_entrada' => $request->fechaEntrada,
            'fecha_salida' => $request->fechaSalida]);

        $roomBookings = [];
        foreach ($booking->rooms as $room) {
            $roomBookings[] = ['id' => $room->pivot->id,'nombre' => $room->nombre, 'room_id' => $room->pivot->room_id,
                'fecha_entrada' => $room->pivot->fecha_entrada, 'fecha_salida' => $room->pivot->fecha_salida];
        }
        $params = [$roomBookings, $id];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function removeBookingRoom(Request $request)
    {
        $this->validate($request, [
            'bookingId' =>  'required',
            'roomId'    =>  'required'
        ]);

        $booking = Booking::find($request->bookingId);
        $roomId = $request->roomId;

        $booking->rooms()->detach($roomId);
        $roomBookings = [];
        foreach ($booking->rooms as $room) {
            $roomBookings[] = ['id' => $room->pivot->id,'nombre' => $room->nombre, 'room_id' => $room->pivot->room_id,
                'fecha_entrada' => $room->pivot->fecha_entrada, 'fecha_salida' => $room->pivot->fecha_salida];
        }
        $params = [$roomBookings, $request->bookingId];

        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function mostrarBookingRooms(Request $request)
    {
        $this->validate($request, [
            'bookingId' => 'required'
        ]);

        $bookingId = $request->bookingId;
        $booking = Booking::find($bookingId);

        $roomBookings = [];
        foreach ($booking->rooms as $room) {
            $roomBookings[] = ['id' => $room->pivot->id,'nombre' => $room->nombre, 'room_id' => $room->pivot->room_id,
                'fecha_entrada' => $room->pivot->fecha_entrada, 'fecha_salida' => $room->pivot->fecha_salida];
        }

        $params = [$roomBookings, $bookingId];
        return view('paginas/clientes/roomBookings/index', compact('params'));
    }

    public function mostrarBookingRoom(Request $request)
    {
        $this->validate($request, [
            'roomId'        =>  'required',
            'bookingId'     =>  'required',
            'roomBookingId' =>  'required'
        ]);

        $booking = Booking::select('*')->where('id', '=', DB::raw($request->bookingId))->first();

        foreach($booking->rooms as $room) {
            if ($room->id == $request->roomId && $room->pivot->id == $request->roomBookingId) {
                $nombre = $room->nombre;
                $tipo = $room->tipo;
                if ($tipo == 'pr')
                    $type = 'Presidencial';
                else if ($tipo == 'JS')
                    $type = 'Junior Suite';
                $fechaEntrada = $room->pivot->fecha_entrada;
                $fechaSalida = $room->pivot->fecha_salida;
            }
        }

        $roomBooking = ['nombre' => $nombre, 'tipo' => $type, 'fecha_entrada' => $fechaEntrada, 'fecha_salida' => $fechaSalida,
            'room_id' => $request->roomId, 'booking_id' => $request->bookingId];

        return view('paginas/clientes/roomBookings/show', compact('roomBooking'));
    }
}
