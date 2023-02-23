<x-zz.base>

    <x-slot:titulo>Crear Empleado</x-slot:titulo>
    <x-slot:encabezado>Crea un Empleado</x-slot:encabezado>

    <form action='{{ route('employees.store') }}' method='post'>
        @method('post')
        @csrf

        <x-employees.campos /><br><br>

        <input class='button' type='submit' name='crear' value='Crear cliente'/>
    </form><br/>

    <a href='{{ route('employees.index') }}'>Volver al listado</a>

</x-zz.base>
