<x-zz.base>

    <x-slot:titulo>Crear Habitación</x-slot:titulo>
    <x-slot:encabezado>Crea una habitación</x-slot:encabezado>

    <form action='{{ route('rooms.store') }}' method='post'>
        @method('post')
        @csrf

        <x-rooms.campos/><br><br>

        <input class='button' type='submit' name='crear' value='Crear habitaciónes' />
    </form><br/>

    <a href='{{ route('rooms.index') }}' class='button'>Volver al listado</a>

</x-zz.base>
