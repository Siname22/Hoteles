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
                <td>{{ $roomBooking['nombre'] }}</td>
                <td>{{ $roomBooking['fecha_entrada'] }}</td>
                <td>{{ $roomBooking['fecha_salida'] }}</td>
                <td>
                    <form action='{{ route('roomBookings.mostrar') }}' method='post'>
                        @csrf
                        <input type='hidden' name='roomId' value='{{ $roomBooking['room_id'] }}' />
                        <input type='hidden' name='roomBookingId' value='{{ $roomBooking['id'] }}' />
                        <input type='hidden' name='bookingId' value='{{ $params[1] }}' />
                        <input type='submit' class='button'value='Detalles' />
                    </form>
                </td>
                <td>
                    <form action='{{ route('roomBookings.eliminate') }}' method='post'>
                        @csrf
                        <input type='hidden' name='roomId' value='{{ $roomBooking['room_id'] }}' />
                        <input type='hidden' name='bookingId' value='{{ $params[1] }}' />
                        <input type='submit' class='button' value='Eliminar'>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>
    <br><br>
    @php $id = $params[1] @endphp
    <form action="{{ route('rooms.filter_add') }}" method="post">
        @csrf
        <input type='hidden' name='id' value='{{ $id }}' />
        <input type="submit" value="Añadir Habitación" class='button'>
    </form>
    <form action="{{ route('bookings') }}" method="post">
        @csrf
        <input type="submit" value="Finalizar Reserva" class='button'>
    </form>

</x-zz.base2>
