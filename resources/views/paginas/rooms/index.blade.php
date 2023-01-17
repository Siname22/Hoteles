<x-zz.base>

    <x-slot:titulo>Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Listado de habitaciones</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Numero de camas</th>
            <th>Precio base</th>
            <th>Máximo de ocupantes</th>
            <th>Terraza</th>
            <th>Eliminar</th>
        </tr>
        @foreach ($rooms as $room)
            <tr>
                <td>
                    <a href='{{ route('rooms.show', $room) }}'>{{ $room->codigo }}</a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room) }}'>{{ $room->nombre }} </a>
                </td>
                <td>
                    <a href='{{ route('rooms.show', $room) }}'>{{ $room->tipo }} </a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room) }}'>{{ $room->estado }}  </a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room ) }}'>{{ $room->numero_camas }} </a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room ) }}'>{{ $room->precio_base }} </a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room ) }}'>{{ $room->max_ocupantes }} </a>
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room ) }}'>{{ $room->terraza ? "Sí" : "No" }} </a>
                </td>

                <td>
                    <form action='{{ route('rooms.destroy', $room) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>
</x-zz.base>
