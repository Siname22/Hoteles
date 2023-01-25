<x-zz.base>

    <x-slot:titulo>Editar Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Modifica la reserva de habitación</x-slot:encabezado>

    <form action = '{{ route('room_bookings.update', $params['room_booking']) }}' method = 'post'>
        @method('put')

        <x-room_bookings.campos :params='$params' />

        <br><br><input id='submit' type='submit' value='Editar reserva de habitación'/>
    </form>

    <form action = '{{ route('room_bookings.destroy', $params['room_booking']) }}' method = 'post'>
        @method('delete')
        <input type='submit' value='Eliminar Reserva de habitación'>
    </form><br>

    <a href='{{ route('room_bookings.index') }}'>Volver al listado</a>

</x-zz.base>
