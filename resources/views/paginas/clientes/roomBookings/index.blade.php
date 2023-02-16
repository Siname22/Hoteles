<x-zz.base2>

    <x-slot:titulo>M2H - Revisión Reserva</x-slot:titulo>
    <x-slot:encabezado>REVISIÓN RESERVA</x-slot:encabezado>

    <br>
    <table id='tabla'>
        <tr>
            <th>Habitación</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th colspan='2'>Acciones</th>
        </tr>

        @foreach ($params[0] as $roomBooking)

            <tr>
                <td>{{ $roomBooking->nombre }}</td>
                <td>{{ $roomBooking->fecha_entrada }}</td>
                <td>{{ $roomBooking->fecha_salida }}</td>
                <td>
                    <form action='{{ route('roomBookings.show', $roomBooking->id) }}' method='post'>

                        @method('get')
                        @csrf

                        <button type='submit' class='button'>Detalles</button>
                    </form>
                </td>
                <td>
                    <form action='{{ route('roomBookings.destroy', $roomBooking->id) }}' method='post'>

                        @method('delete')
                        @csrf

                        <button type='submit' class='button'>Eliminar</button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    <br><br>
    @php $id = $params[1] @endphp
    <form action="{{ route('rooms.filter', compact('id')) }}" method="get">
        <input type="submit" value="Añadir Habitación" class='button'>
    </form>
    <form action="{{ route('bookings') }}" method="get">
        <input type="submit" value="Finalizar Reserva" class='button'>
    </form>

</x-zz.base2>
