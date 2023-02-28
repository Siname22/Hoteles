<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::orderBy('nombre')->get();
        return view('paginas/clientes/clients/index', compact('clients'));
    }

    public function create()
    {
        return view('paginas/clientes/clients/create');
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
        return view('paginas/clientes/clients/show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('paginas/clientes/clients/edit', compact('client'));
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

    public function comprobarAutorizacion(){

        $cliente = Client::select('*')->where('user_id', '=', DB::raw(auth()->id()))->first();
        $empleado = Employee::select('*')->where('user_id', '=', DB::raw(auth()->id()))->first();

        if(isset($cliente->id)){
            return view("paginas/clientes/clientHome/clientHome");
        }elseif($empleado->rol=="admin"){
            return view("paginas/empleados/empleadoHome/empleadoHome");
        }else{
            return view("paginas/empleados/empleadoHome/empleadoHome");
        }

    }
}
