<x-zz.base2>

    <x-slot:titulo>Editar Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Modifica la reserva de habitación</x-slot:encabezado>

    <form action='{{ route('roomBookings.update', $params['roomBooking']) }}' method='post'>
        @method('put')
        @csrf

        <x-roomBookings.campos :params='$params' />

        <br><br><input id='submit' type='submit' value='Editar reserva de habitación' class='button'/>
    </form>

    <form action='{{ route('roomBookings.destroy', $params['roomBooking']) }}' method='post'>
        @method('delete')
        <input type='submit' value='Eliminar Reserva de habitación' class='button'>
    </form><br>


</x-zz.base2>
