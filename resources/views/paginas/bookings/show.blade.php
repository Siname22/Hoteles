<x-zz.base>

    <x-slot:titulo>Editar Reserva</x-slot:titulo>
    <x-slot:encabezado>Modifica la reserva</x-slot:encabezado>

    <p>Fecha Entrada: {{ $booking->fecha_entrada }}</p>
    <p>Fecha Salida: {{ $booking->fecha_salida }}</p>
    <p>Precio: {{ $booking->precio }}</p>
    <p>Observaciones: {{ $booking->observacion }}</p>
    <p>Cliente: {{ $booking->client->nombre }}</p><br>

    <form action = '{{ route('bookings.destroy', $booking) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Reserva'>
    </form>

    <a href = '{{ route('bookings.edit', $booking) }}'>Editar Reserva</a>
    <br><br><a href = '{{ route('bookings.index') }}'>Listado Reservas</a>

</x-zz.base>
