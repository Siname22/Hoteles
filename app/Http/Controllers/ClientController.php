<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::orderBy('nombre')->get();
        return view('paginas/clients/index', compact('clients'));
    }

    public function create()
    {
        return view('paginas/clients/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    =>  'required',
            'apellidos' =>  'required',
            'dni'       =>  'required',
            'email'     =>  'required',
            'telefono'  =>  'required',
        ]);

        $client             =   new Client();
        $client->nombre     =   $request->nombre;
        $client->apellidos  =   $request->apellidos;
        $client->dni        =   $request->dni;
        $client->email      =   $request->email;
        $client->telefono   =   $request->telefono;
        $client->save();

        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        return view('paginas/clients/show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('paginas/clients/edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'apellidos' => 'required',
            'dni'       => 'required',
            'email'     => 'required',
            'telefono'  => 'required',
        ]);

        $client->nombre     =   $request->nombre;
        $client->apellidos  =   $request->apellidos;
        $client->dni        =   $request->dni;
        $client->email      =   $request->email;
        $client->telefono   =   $request->telefono;
        $client->save();

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

    public function comprobarAutorizacion()
    {
        switch (auth()->user()->comprobarAutorizacion(auth()->id())) {
            case "Administrador":
                $rol = "Administrador";
                return view('paginas/empleados/empleadoHome/empleadoHome', compact('rol'));
            case "Recepcion":
                $rol = "Recepcion";
                return view('paginas/empleados/empleadoHome/empleadoHome', compact('rol'));
            case "RRHH":
                $rol = "RRHH";
                return view('paginas/empleados/gestionarEmpleados/index', compact('rol'));
            default:
                return view('paginas/clientes/clientHome/clientHome');
        }
    }
}
