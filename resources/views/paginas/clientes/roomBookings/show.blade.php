<x-zz.base2>

    <x-slot:titulo>M2H - Detalles Habitación</x-slot:titulo>
    <x-slot:encabezado>DETALLES DE HABITACIÓN</x-slot:encabezado>

    <table id='tabla'>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Entrada</th>
        <th>Salida</th>
        <th>Eliminar</th>

        <tr id='fila'>
            <td>{{ $roomBooking['nombre']}}</td>

            <td>
                {{ $roomBooking['tipo'] }}
            </td>

            <td>
                {{ $roomBooking['fecha_entrada'] }}
            </td>

            <td>
                {{ $roomBooking['fecha_salida'] }}
            </td>

            <td>
                <form action='{{ route('roomBookings.eliminate') }}' method='post'
                      style='margin-top: 13px'>
                    @csrf
                    <input type='hidden' name='roomId' value='{{ $roomBooking['room_id'] }}' />
                    <input type='hidden' name='bookingId' value='{{ $roomBooking['booking_id'] }}' />
                    <input type='submit' value='Eliminar' class='button'>
                </form>
            </td>

        </tr>

    </table>

    <br><br>
    <form action="{{ route('roomBookings.list') }}" method="post">
        @csrf
        <input type='hidden' name='bookingId' value='{{ $roomBooking['booking_id'] }}' />
        <input type="submit" class="button" value="Atrás"/>
    </form>

</x-zz.base2>
