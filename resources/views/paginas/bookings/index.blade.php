<x-zz.base>

    <x-slot:titulo>Reservas</x-slot:titulo>
    <x-slot:encabezado>Listado de reservas</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Precio</th>
            <th>Observación</th>
            <th>Cliente</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($bookings as $booking)
            <tr>
                <td>
                    <a href='{{ route('bookings.show', $booking) }}'>{{ $booking->precio }} </a>
                </td>

                <td>
                    <a href='{{ route('bookings.show', $booking) }}'>{{ $booking->observacion }}  </a>
                </td>

                <td>
                    <a href='{{ route('bookings.show', $booking ) }}'>{{ $booking->client->nombre }} </a>
                </td>

                <td>
                    <form action='{{ route('bookings.destroy', $booking) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

</x-zz.base>
