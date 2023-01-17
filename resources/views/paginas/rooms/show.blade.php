<x-zz.base>

    <x-slot:titulo>Editar Habitación</x-slot:titulo>
    <x-slot:encabezado>Modifica la habitación</x-slot:encabezado>

    <p>Código: {{ $room->codigo }}</p>
    <p>Nombre: {{ $room->nombre }}</p>
    <p>Tipo: {{ $room->precio }}</p>
    <p>Estado: {{ $room->observacion }}</p>
    <p>Número de camas: {{ $room->numero_camas }}</p>
    <p>Precio base: {{ $room->precio_base }}</p>
    <p>Máximo de ocupantes: {{ $room->max_ocupantes }}</p>
    <p>Terraza: {{ $room->terraza ? "Sí" : "No" }}</p><br>

    <form action = '{{ route('rooms.destroy', $room) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Habitación'>
    </form><br>

    <a href = '{{ route('rooms.edit', $room) }}'>Editar Habitación</a>
    <br><br><a href = '{{ route('rooms.index') }}'>Listado Habitaciones</a>

</x-zz.base>
