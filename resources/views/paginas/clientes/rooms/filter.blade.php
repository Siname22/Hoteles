<x-zz.base2>

    <x-slot:titulo>Habitaciones</x-slot:titulo>
    <x-slot:encabezado>Filtrado de habitaciones</x-slot:encabezado>

        <form action="{{ route('rooms.available_rooms') }}" method='post'>
            @csrf
            <label for='fecha_entrada'>Fecha de inicio: </label>
            <input type='date' id='fecha_entrada' name='fecha_entrada'>

            <label for='fecha_salida'>Fecha de fin: </label>
            <input type='date' id='fecha_salida' name='fecha_salida'>

            <label for="numero_camas">Numero de Camas: </label>
            <input type="number" id="numero_camas" min="1" name="numero_camas" value="1"/>

            <label for="terraza">Terraza: </label>
            <input type="checkbox" id="terraza" name="terraza">

            @if (isset($id))
            <input type='hidden' name='bookingId' value='{{ $id }}' />
            @endif

            <input type="submit" value="Filtrar" class="button">

        </form>
        @if(isset($id))
        <form action="{{ route('roomBookings.list') }}" method="post">
            @csrf
            <input type="hidden" name="bookingId" value="{{ $id }}" />
            <input type="submit" value="Volver" class="button">
        </form>
        @else
        <form action="{{ route('client_home') }}" method="get">

            <input type="submit" value="Volver" class="button">
        </form>
        @endif

</x-zz.base2>
