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
        @foreach ($prms[1] as $room)
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

                    <form action="{{ route('rooms.mostrar_habitacion') }}" method="post">
                        @csrf
                        <input type='hidden' name='fechaEntrada' value='{{ $prms[0][0] }}' />
                        <input type='hidden' name='fechaSalida' value='{{ $prms[0][1] }}' />
                        <input type='hidden' name='numeroCamas' value='{{ $prms[0][2] }}' />
                        <input type='hidden' name='terraza' value='{{ $prms[0][3] }}' />
                        <input type='hidden' name='roomId' value='{{ $room->id }}' />
                        @if(sizeof($prms[0]) == 5)
                        <input type='hidden' name='bookingId' value='{{ $prms[0][4] }}' />
                        @endif
                        <input type='submit' class='button' value='Ver' />
                    </form>
                </td>
            </tr>
        @endforeach

    </table><br><br>

    <br>
    @if(sizeof($prms[0]) == 5)
    <form action="{{ route('rooms.filter_add') }}" method="post">
        @csrf
        <input type="hidden" name="id" value="{{ $prms[0][4] }}" />
    @else
    <form action="{{ route('rooms.filter_create') }}" method="post">
        @csrf
    @endif

        <input type="submit" value="Volver" class="button">
    </form>

</x-zz.base2>
