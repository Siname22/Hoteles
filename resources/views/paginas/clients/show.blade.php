<x-zz.base>

    <x-slot:titulo>Editar Cliente</x-slot:titulo>
    <x-slot:encabezado>Modifica la cliente</x-slot:encabezado>

    <p>Nombre: {{ $client->nombre }}</p>
    <p>Apellidos: {{ $client->apellidos }}</p>
    <p>DNI: {{ $client->dni }}</p>
    <p>Email: {{ $client->email }}</p>
    <p>Telefono: {{ $client->telefono }}</p><br>

    <form action = '{{ route('clients.destroy', $client) }}' method = 'post'>
        @method('delete')
        <input type = 'submit' value = 'Eliminar Cliente'>
    </form>

    <a href = '{{ route('clients.edit', $client) }}'>Editar Cliente</a>
    <br><br><a href = '{{ route('clients.index') }}'>Listado Clientes</a>

</x-zz.base>
