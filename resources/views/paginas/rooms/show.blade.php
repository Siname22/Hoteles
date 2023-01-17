<x-zz.base>

    <x-slot:titulo>Editar Habitación</x-slot:titulo>
    <x-slot:encabezado>Modifica la habitación</x-slot:encabezado>

    <p>ID: {{ $room->id }}</p>
    <p>Código: {{ $room->codigo }}</p>
    <p>Nombre: {{ $room->nombre }}</p>
    <p>Tipo: {{ $room->precio }}</p>
    <p>Estado: {{ $room->observacion }}</p>
    <p>Número de camas: {{ $room->numero_camas }}</p><br>
    <p>Precio base: {{ $room->precio_base }}</p><br>
    <p>Máximo de ocupantes: {{ $room->max_ocupantes }}</p><br>
    <p>Terraza: {{ $room->terraza ? "Sí" : "No" }}</p><br>

    <form action = '{{ route('bookings.destroy', $booking) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Reserva'>
    </form><br>

    <a href = '{{ route('rooms.edit', $booking) }}'>Editar Habitación</a>
    <br><br><a href = '{{ route('rooms.index') }}'>Listado Habitaciones</a>

</x-zz.base>
