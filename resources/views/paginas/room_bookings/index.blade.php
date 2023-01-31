<x-zz.base2>

<x-slot:titulo>Mis Reservas</x-slot:titulo>
<x-slot:encabezado>MIS RESERVAS</x-slot:encabezado>

    <br><table id='tabla'>
        <tr>
            <th>Habitación</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th colspan='2'>Acciones</th>
        </tr>

        @foreach ($room_bookings as $room_booking)

            <tr>
                <td>{{ $room_booking->room->nombre }}</td>
                <td>{{ $room_booking->fecha_entrada }}</td>
                <td>{{ $room_booking->fecha_salida }}</td>
                <td>
                    <form action='{{ route('room_bookings.show', $room_booking) }}' method='post'>

                        @method('get')
                        @csrf

                        <button type='submit'>Detalles</button>
                    </form>
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
    <input type="button" onclick="history.back()" value="Atrás">
</x-zz.base2>
