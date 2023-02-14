<x-zz.base2>

    <x-slot:titulo>Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Filtrado de habitaciones</x-slot:encabezado>

    <form action="{{ route('rooms.receive_params', compact('id')) }}" method='get'>
        <label for='fecha_entrada'>Fecha de inicio: </label>
        <input type='date' id='fecha_entrada' name='fecha_entrada'>

        <label for='fecha_salida'>Fecha de fin: </label>
        <input type='date' id='fecha_salida' name='fecha_salida'>

        <label for="numero_camas">Numero de Camas: </label>
        <input type="number" id="numero_camas" name="numero_camas"/>

        <label for="terraza">Terraza: </label>
        <input type="checkbox" id="terraza" name="terraza">

        <input type="submit" value="Filtrar" class="button">

    </form>

    <form action="{{ route('login') }}" method="get">
        <input type="submit" value="Volver" class="button">
    </form>

</x-zz.base2>
