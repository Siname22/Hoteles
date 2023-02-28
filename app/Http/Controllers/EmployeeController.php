<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function index()
    {
            $employees = Employee::orderBy('nombre')->get();
            return view('paginas/empleados/employees/index', compact('employees'));
    }



    public function create()
    {
        return view('paginas/empleados/employees/create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre'    =>  'required',
            'apellidos' =>  'required',
            'telefono'  =>  'required',
            'rol'       =>  'required',
            'email'     =>  'required',
            'password'  =>  'required'
        ]);

        $userId = DB::table('employees')->insertGetId([
            'name'  =>  $request->nombre,
            'email' =>  $request->email,
            'email_verified_at' => null,
            'password' => Hash::make($request->password),
            'remember_token' => null
        ]);
        $employee             =   new Employee();
        $employee->user_id    =   $userId;
        $employee->nombre     =   $request->nombre;
        $employee->apellidos  =   $request->apellidos;
        $employee->telefono   =   $request->telefono;
        $employee->rol        =   $request->rol;
        $employee->save();

        return redirect()->route('employees.index');
    }


    public function show(Employee $employee)
    {
        return view('paginas/empleados/employees/show', compact('employee'));
    }


    public function edit(Employee $employee)
    {
        return view('paginas/empleados/employees/edit', compact('employee'));
    }


    public function update(Request $request, Employee $employee)
    {
        $this->validate($request, [
            'nombre'    => 'required',
            'apellidos' => 'required',
            'telefono'       => 'required',
            'rol'     => 'required',
        ]);

        $employee->nombre     =   $request->nombre;
        $employee->apellidos  =   $request->apellidos;
        $employee->telefono   =   $request->telefono;
        $employee->rol        =   $request->rol;
        $employee->save();

        return redirect()->route('employees.index');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
