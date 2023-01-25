<x-zz.base>

    <x-slot:titulo>Editar Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Modifica las habitaciones</x-slot:encabezado>

    <form action = '{{ route('rooms.update', $room) }}' method = 'post'>
        @method('put')

        <x-rooms.campos :room='$room'/>

        <br><br><br><input type='submit' value='Editar Habitación'/>
    </form>

    <form action = '{{ route('rooms.destroy', $room) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Habitación'>
    </form><br>

    <a href='{{ route('rooms.index') }}'>Volver al listado</a>

</x-zz.base>
