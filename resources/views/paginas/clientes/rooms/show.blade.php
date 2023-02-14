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
    @php
        $paramsCreate = $prms[0].", ".$prms[1]->id;
        $params = $prms[0];
    @endphp
    <form action='{{ route('rooms.auto_create_assignment', compact('paramsCreate')) }}' method='get'>

        <input class='button' type='submit' value='Añadir Habitación'/>
    </form>
    <br>


    <a href = '{{ route('rooms.available_rooms', compact('params')) }}'> <button class='button'> Volver </button> </a>

</x-zz.base2>
