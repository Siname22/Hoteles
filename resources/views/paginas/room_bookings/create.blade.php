<x-zz.base2>

    <x-slot:titulo>Crear Reserva de habitación</x-slot:titulo>
    <x-slot:encabezado>Crea una reserva de habitación</x-slot:encabezado>

    <form action='{{ route('room_bookings.store') }}' method='post'>
        @method('post')
        @csrf

        <x-room_bookings.campos :params='$params' /><br><br>

        <input class='button' type='submit' value='Crear reserva de habitación'/>
    </form><br/>


</x-zz.base2>
