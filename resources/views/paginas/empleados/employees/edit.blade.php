<x-zz.base>

    <x-slot:titulo>Editar Empleado</x-slot:titulo>
    <x-slot:encabezado>Modifica el empleado</x-slot:encabezado>

    <form action = '{{ route('employees.update', $employee) }}' method = 'post'>
        @method('put')
        @csrf

        <x-employees.campos :employee='$employee' />

        <br><br><br><input type='submit' value='Editar Empleado' class='button'/>
    </form>

    <form action = '{{ route('employees.destroy', $employee) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar empleado' class='button'>
    </form><br>

    <a href='{{ route('employees.index') }}'>Volver al listado</a>

</x-zz.base>
