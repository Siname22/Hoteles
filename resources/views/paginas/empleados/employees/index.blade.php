<x-zz.base>

    <x-slot:titulo>Empleados</x-slot:titulo>
    <x-slot:encabezado>Listado de Empleados</x-slot:encabezado>

    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Eliminar</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}">{{$employee->nombre}}</a>
                </td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}">{{$employee->apellidos}}</a>
                </td>
                <td>
                    <a href="{{route('employees.show', $employee->id) }}">{{$employee->telefono}}</a>
                </td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}">{{$employee->rol}}</a>
                </td>
                <td>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                        @method('delete')
                        @csrf

                        <button type="submit" class='button'> Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table><br><br>
</x-zz.base>
