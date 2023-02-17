<x-zz.base>

    <x-slot:titulo>Crear Cliente</x-slot:titulo>
    <x-slot:encabezado>Crea una cliente</x-slot:encabezado>

    <form action='{{ route('clients.store') }}' method='post'>
        @method('post')
        @csrf

        <x-clients.campos /><br><br>

        <input class='button' type='submit' name='crear' value='GUARDAR'/>
        <input class='button' type='submit' name='cancelar' value='CANCELAR'/>
    </form><br/>

    <a href='{{ route('clients.index') }}'>Volver al listado</a>

</x-zz.base>
