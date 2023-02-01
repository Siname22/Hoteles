<x-zz.base2>

    <x-slot:titulo>Editar Habitación</x-slot:titulo>
    <x-slot:encabezado>Detalles de la habitación</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Estado</th>
            <th>Número de camas</th>
            <th>Precio base</th>
            <th>Máximo de ocupantes</th>
            <th>Terraza</th>
        </tr>
        <tr>
            <td>{{ $room->nombre }}</td>
            <td>{{ $room->estado }}</td>
            <td>{{ $room->numero_camas }}</td>
            <td>{{ $room->precio_base }}</td>
            <td>{{ $room->max_ocupantes }}</td>
            <td>{{ $room->terraza }}</td>
        </tr>


    </table>

    <br>
    <form action='{{ route('room_bookings.edit', $room) }}' method='get'>

        <input class='button' type='submit' value='Añadir a la reserva'/>
    </form>
    <br>


    <a href = '{{ route('rooms.index') }}'> <button> Volver </button> </a>

</x-zz.base2>
