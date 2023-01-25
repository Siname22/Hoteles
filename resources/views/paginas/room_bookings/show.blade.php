<x-zz.base>

    <x-slot:titulo>Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Detalles de reserva de habitación</x-slot:encabezado>

    <p>Habitación: {{ $room_booking->room->codigo }}</p>
    <p>Fecha de entrada: {{ $room_booking->fecha_entrada }}</p><br>
    <p>Fecha de salida: {{ $room_booking->fecha_salida }}</p><br>

    <form action = '{{ route('room_bookings.destroy', $room_booking) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Reserva de habitación'>
    </form>

    <a href = '{{ route('room_bookings.edit', $room_booking) }}'>Editar Reserva de habitación</a>
    <br><br><a href = '{{ route('room_bookings.index') }}'>Listado Reservas de habitación</a>

</x-zz.base>
