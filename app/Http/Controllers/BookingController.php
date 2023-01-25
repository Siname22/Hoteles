<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Client;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::orderBy('codigo')->get();
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
        $clients = Client::orderBy('nombre') -> get();
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
}
