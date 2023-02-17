<x-zz.base>

    <x-slot:titulo>Editar Cliente</x-slot:titulo>
    <x-slot:encabezado>Modifica el cliente</x-slot:encabezado>

    <form action = '{{ route('clients.update', $client) }}' method = 'post'>
        @method('put')

        <x-clients.campos :client='$client' />

        <br><br><br><input type='submit' value='GUARDAR' class='button'/>
    </form>

    <form action = '{{ route('clients.destroy', $client) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar cliente' class='button'>
    </form><br>

    <a href='{{ route('clients.index') }}'>Volver al listado</a>

</x-zz.base>
