<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Client;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('fecha_entrada')->get();
        return view('paginas/bookings/index', compact('bookings'));
    }

    public function create()
    {
        $clients = Client::orderBy('nombre')->get();
        return view('paginas/bookings/create', compact('clients'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha_entrada' =>  'required',
            'fecha_salida'  =>  'required',
            'precio'        =>  'required',
            'observacion'   =>  'required',
            'client_id'     =>  'required',
        ]);

        $booking = new Booking();
        $booking->fecha_entrada = $request->fecha_entrada;
        $booking->fecha_salida = $request->fecha_salida;
        $booking->precio = $request->precio;
        $booking->observacion = $request->observacion;
        $booking->client_id = $request->client_id;
        $booking->save();

        return redirect()->route('bookings.index');
    }

    public function show(Booking $booking)
    {
        return view('paginas/bookings/show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        //
    }

    public function update(Request $request, Booking $booking)
    {
        //
    }

    public function destroy(Booking $booking)
    {
        //
    }
}
