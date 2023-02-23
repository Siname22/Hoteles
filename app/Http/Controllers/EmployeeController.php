<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
        ]);

        $employee             =   new Employee();
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
