<x-zz.base>

    <x-slot:titulo>Reservas de habitaciones</x-slot:titulo>
    <x-slot:encabezado>Listado de reservas de habitaciones</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Habitación</th>
            <th>Fecha de entrada</th>
            <th>Fecha de salida</th>
        </tr>
        @foreach ($room_bookings as $room_booking)
            <tr>
                <td>
                    <a href='{{ route('room_bookings.show', $room_booking) }}'>{{ $room_booking->room->nombre }} </a>
                </td>

                <td>
                    <a href='{{ route('room_bookings.show', $room_booking) }}'>{{ $room_booking->fecha_entrada }}  </a>
                </td>

                <td>
                    <a href='{{ route('room_bookings.show', $room_booking ) }}'>{{ $room_booking->fecha_salida }} </a>
                </td>

                <td>
                    <form action='{{ route('room_bookings.destroy', $room_booking) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

</x-zz.base>
