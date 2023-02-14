<x-zz.base2>

    <x-slot:titulo>Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Habitaciones disponibles</x-slot:encabezado>

    <table id="tabla">
        <tr>
            <th>Nombre</th>
            <th>Numero de camas</th>
            <th>Precio base</th>
            <th>Máximo de ocupantes</th>
            <th>Terraza</th>
            <th>Ver</th>
        </tr>
        @foreach ($availableRooms as $room)
            <tr>

                <td>
                    {{ $room->nombre }}
                </td>

                <td>
                   {{ $room->numero_camas }}
                </td>

                <td>
                    {{ $room->precio_base }}
                </td>

                <td>
                    {{ $room->max_ocupantes }}
                </td>

                <td>
                    {{ $room->terraza == 1 ? "Si" : "No" }}
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room->id ) }}'><button>Ver</button></a>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <br>

    <form action="clientHome" method="get">
        <input type="submit" value="Volver">
    </form>

</x-zz.base2>
