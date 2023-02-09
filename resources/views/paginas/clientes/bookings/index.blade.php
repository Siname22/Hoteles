<x-zz.base2>

    <x-slot:titulo>Mis Reservas</x-slot:titulo>
    <x-slot:encabezado>Mis reservas</x-slot:encabezado>

    <table id="tabla">


        <tr>
            <th>Nº </th>
            <th>Precio</th>
            <th>Habitaciones</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($bookings as $booking)
            <tr>
                <td>
                    {{$booking->id }}
                </td>
                <td>
                    {{ $booking->precio }}
                </td>

                <td>
                    <form action='{{ route('roomAssignments', $booking->id) }}'>
                        <button type='submit'>Ver</button>
                    </form>
                </td>

                <td>
                    <form action='{{ route('bookings.destroy', $booking->id) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <br><br>

    <form action="clientHome" method="get">
        <input type="submit" value="Volver">
    </form>

</x-zz.base2>
