<x-zz.base>

    <x-slot:titulo>Editar Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Modifica las habitaciones</x-slot:encabezado>

    <form action = '{{ route('rooms.update', $rooms) }}' method = 'post'>
        @method('put')

        <x-rooms.campos :room='$room' :clients='$clients' />

        <br><br><br><button type='submit'>Editar Habitacion</button>
    </form>

    <form action = '{{ route('$rooms.destroy', $room) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Habitacion'>
    </form><br>

    <a href='{{ route('rooms.index') }}'>Volver al listado</a>

</x-zz.base>
