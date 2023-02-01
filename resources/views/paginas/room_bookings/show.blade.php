<x-zz.base2>

    <x-slot:titulo>Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Detalles de reserva de habitación</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Habitación</th>
            <th>Fecha de Entrada</th>
            <th>Fecha de Salida</th>
        </tr>
        <tr>
            <td> {{ $room_booking->room->codigo }}</td>
            <td> {{ $room_booking->fecha_entrada }}</td>
            <td> {{ $room_booking->fecha_salida }}</td>
        </tr>

    </table>
    <br>
    <form action = '{{ route('room_bookings.destroy', $room_booking) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Reserva de habitación'>
    </form>

    <a href = '{{ route('room_bookings.edit', $room_booking) }}'><button>Editar Reserva de habitación</button></a>

</x-zz.base2>
