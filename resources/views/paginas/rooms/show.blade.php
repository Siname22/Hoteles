<x-zz.base2>

    <x-slot:titulo>{{$room->nombre}}</x-slot:titulo>
    <x-slot:encabezado>{{$room->nombre}}</x-slot:encabezado>

    <table id="tabla">
        <tr>
            <th>Número de camas</th>
            <th>Precio base</th>
            <th>Máximo de ocupantes</th>
            <th>Terraza</th>
        </tr>
        <tr>
            <td>{{ $room->numero_camas }}</td>
            <td>{{ $room->precio_base }}</td>
            <td>{{ $room->max_ocupantes }}</td>
            <td>{{ $room->terraza }}</td>
        </tr>


    </table>

    <br>
    <form action='{{ route('roomAssignments.create', $room) }}' method='get'>

        <input class='button' type='submit' value='Añadir a la reserva'/>
    </form>
    <br>


    <a href = '{{ route('rooms.index') }}'> <button> Volver </button> </a>

</x-zz.base2>
