<x-zz.base2>

    <x-slot:titulo>M2H - Habitaciones</x-slot:titulo>
    <x-slot:encabezado>LISTADO HABITACIONES</x-slot:encabezado>

    <form action="index.blade.php" method="get">
            <label for='fecha_entrada'>Fecha de Entrada </label>
            <input type='date' id='fecha_entrada' name='fecha_entrada' value='{{ $params['room_booking']->fecha_entrada ?? '' }}'>

            <label for='fecha_salida'>Fecha de Salida </label>
            <input type='date' id='fecha_salida' name='fecha_salida' value='{{ $params['room_booking']->fecha_salida ?? '' }}'>

            <label for="num_camas">Número de Camas </label>
            <input type="number" id="num_camas" name="num_camas" value="{{ $room->numero_camas ?? '' }}"/>

            <label for="terraza">Terraza </label>
            <input type="checkbox" id="terraza" name="terraza">

            <input type="submit" value="Filtrar Búsqueda">

    </form>

    <br>
    <table id="tabla">
        <tr>
            <th>Nombre</th>
            <th>Camas</th>
            <th>Precio</th>
            <th>Ocupantes</th>
            <th>Terraza</th>
            <th>Detalles</th>
        </tr>
        @foreach ($rooms as $room)
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
                    {{ $room->terraza ? "Sí" : "No" }}
                </td>

                <td>
                    <a href='{{ route('rooms.show', $room ) }}'><button>Ver</button></a>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <br>

    <form action="clientHome" method="get">
        <input type="submit" value="Volver">
    </form>

</x-zz.base2>
