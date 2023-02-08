<x-zz.base2>

    <x-slot:titulo>Edición de reserva</x-slot:titulo>
    <x-slot:encabezado>Edición de reserva</x-slot:encabezado>

    <br>
    <table id='tabla'>
        <tr>
            <th>Habitación</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th colspan='2'>Acciones</th>
        </tr>

        @foreach ($roomAssignments as $roomAssignment)

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

    <form action="bookings" method="get">
        <input type="submit" value="Volver" class='button'>
    </form>
    <form action="bookings/edit" method="get">
        <input type="submit" value="Añadir" class='button'>
    </form>
    <button class='button'>Finalizar</button>
</x-zz.base2>
