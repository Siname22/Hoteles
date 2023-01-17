<x-zz.base>

    <x-slot:titulo>Crear Habitacion</x-slot:titulo>
    <x-slot:encabezado>Crea una habitacion</x-slot:encabezado>

    <form action='{{ route('rooms.store') }}' method='post'>
        @method('post')
        @csrf

        <x-rooms.campos :rooms='$room' /><br><br>

        <input class='button' type='submit' name='crear' value='Crear habitaciones' />
    </form><br/>

    <a href='{{ route('rooms.index') }}'>Volver al listado</a>

</x-zz.base>
