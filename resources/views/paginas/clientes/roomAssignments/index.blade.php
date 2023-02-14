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

        @foreach ($params[0] as $roomAssignment)

            <tr>
                <td>{{ $roomAssignment->nombre }}</td>
                <td>{{ $roomAssignment->fecha_entrada }}</td>
                <td>{{ $roomAssignment->fecha_salida }}</td>
                <td>
                    <form action='{{ route('roomAssignments.show', $roomAssignment->id) }}' method='post'>

                        @method('get')
                        @csrf

                        <button type='submit' class='button'>Detalles</button>
                    </form>
                </td>
                <td>
                    <form action='{{ route('roomAssignments.destroy', $roomAssignment->id) }}' method='post'>

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
