<x-zz.base>

    <x-slot:titulo>Editar Reserva</x-slot:titulo>
    <x-slot:encabezado>Modifica la reserva</x-slot:encabezado>

    <form action = '{{ route('bookings.update', $booking) }}' method = 'post'>
        @method('put')

        <x-bookings.campos :booking='$booking' :clients='$clients' />

        <br><br><br><button type='submit'>Editar Reserva</button>
    </form>

    <form action = '{{ route('bookings.destroy', $booking) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Reserva'>
    </form><br>

    <a href='{{ route('bookings.index') }}'>Volver al listado</a>

</x-zz.base>
