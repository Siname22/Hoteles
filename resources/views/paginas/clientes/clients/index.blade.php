<x-zz.base>

    <x-slot:titulo>Clientes</x-slot:titulo>
    <x-slot:encabezado>Listado de Clientes</x-slot:encabezado>

    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Tlf</th>
            <th>Eliminar</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>
                    <a href="{{ route('clients.show', $client) }}">{{$client->nombre}}</a>
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">{{$client->apellidos}}</a>
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">{{$client->dni}}</a>
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">{{$client->getMail()}}</a>
                </td>
                <td>
                    <a href="{{ route('clients.show', $client) }}">{{$client->telefono}}</a>
                </td>
                <td>
                    <form action="{{ route('clients.destroy', $client) }}" method="post">
                        @method('delete')
                        @csrf

                        <button type="submit" class='button'> Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table><br><br>

    <form action='{{ route('clients.create') }}' method='get'>
        <input type='submit' value='Crear nuevo' class='button' />
    </form>

    <form action='{{ route('client_home') }}' method='get'>
        <input type='submit' value='Volver' class='button' />
    </form>
</x-zz.base>
