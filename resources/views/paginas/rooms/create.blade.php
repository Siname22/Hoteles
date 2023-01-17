<x-zz.base>

    <x-slot:titulo>Crear Reserva</x-slot:titulo>
    <x-slot:encabezado>Crea una reserva</x-slot:encabezado>

    <form action='{{ route('bookings.store') }}' method='post'>
        @method('post')
        @csrf

        <x-bookings.campos :clients='$clients' /><br><br>

        <input class='button' type='submit' name='crear' value='Crear reserva' />
    </form><br/>

    <a href='{{ route('bookings.index') }}'>Volver al listado</a>

</x-zz.base>
