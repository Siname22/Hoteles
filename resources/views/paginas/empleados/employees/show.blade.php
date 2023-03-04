<x-zz.base>

    <x-slot:titulo>Editar Cliente</x-slot:titulo>
    <x-slot:encabezado>Modifica la cliente</x-slot:encabezado>

    <p>Nombre: {{ $employee->nombre }}</p>
    <p>Apellidos: {{ $employee->apellidos }}</p>
    <p>Telefono: {{ $employee->telefono }}</p>
    <p>Rol: {{ $employee->rol }}</p>

    <form action = '{{ route('employees.destroy', $employee->id) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Empleado' class='button'>
    </form>

    <a href = '{{ route('employees.edit', $employee->id) }}' class='button'>Editar Empleado</a>
    <br><br><a href = '{{ route('employees.index') }}' class='button'>Listado Empleados</a>

</x-zz.base>
