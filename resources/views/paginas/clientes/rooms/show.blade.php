<x-zz.base2>

    <x-slot:titulo>M2H - Detalles Habitación</x-slot:titulo>
    <x-slot:encabezado>{{ $prms[1]->nombre }}</x-slot:encabezado>

    <table id="tabla">
        <tr>
            <th>Camas</th>
            <th>Precio</th>
            <th>Ocupantes</th>
            <th>Terraza</th>
        </tr>
        <tr>
            <td>{{ $prms[1]->numero_camas }}</td>
            <td>{{ $prms[1]->precio_base }}</td>
            <td>{{ $prms[1]->max_ocupantes }}</td>
            <td>{{ $prms[1]->terraza == 1 ? "Sí" : "No" }}</td>
        </tr>

    </table>

    <br>
    @if(sizeof($prms[0]) == 6)
    <form action='{{ route('rooms.auto_create_assignment') }}' method='post'>
        @csrf
        <input type='hidden' name='fechaEntrada' value='{{ $prms[0][0] }}' />
        <input type='hidden' name='fechaSalida' value='{{ $prms[0][1] }}' />
        <input type='hidden' name='roomId' value='{{ $prms[0][4] }}' />
        <input type='hidden' name='bookingId' value='{{ $prms[0][5] }}' />
    @else
    <form action='{{ route('bookings.auto_create') }}' method='post'>
        @csrf
        <input type='hidden' name='fechaEntrada' value='{{ $prms[0][0] }}' />
        <input type='hidden' name='fechaSalida' value='{{ $prms[0][1] }}' />
        <input type='hidden' name='roomId' value='{{ $prms[0][4] }}' />
    @endif
        <input class='button' type='submit' value='Añadir Habitación'/>
    </form>
    <br>

    <form action='{{ route('rooms.available_rooms') }}' method='post'>
        <input type='hidden' name='fechaEntrada' value='{{ $prms[0][0] }}' />
        <input type='hidden' name='fechaSalida' value='{{ $prms[0][1] }}' />
        <input type='hidden' name='numeroCamas' value='{{ $prms[0][2] }}' />
        <input type='hidden' name='terraza' value='{{ $prms[0][3] }}' />
        @if(sizeof($prms[0]) == 6)
        <input type='hidden' name='bookingId' value='{{ $prms[0][5] }}' />
        @endif
        <input class='button' type='submit' value='Volver'/>
    </form>

</x-zz.base2>
