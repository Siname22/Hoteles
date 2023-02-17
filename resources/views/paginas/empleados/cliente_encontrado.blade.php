<html>
    <head>
        <title>Busqueda de Clientes</title>
        <link rel='stylesheet' href='\css\Styles.css'>
    </head>
    <body>
    <div id='div_logo'>
        <a id='div_logo'>
            <img src="/img/logofinal.png" id='logo' alt='logo M2H' title='M2H logo'>
        </a>
    </div>
    <br/>
    <h1>CLIENTE 001</h1>
    //Falta pulirlo
    {{ route('clients.show') }}
    <div id='div_form_empleado'>
        <form action="{{ route('clients.edit', $client) }}" method='post'>
            <input type="submit" value="EDITAR" id='editar_clientes'>
        </form>

        <form action="{{ route('clients.destroy', $client) }}" method='post'>
            <input type="submit" value="ELIMINAR" id='eliminar_clientes'>
        </form>

        <form action="{{ route('bookings.show', $client) }}" method='post'>
            <input type="submit" value="SUS RESERVAS" id='reserva_clientes'>
        </form>
    </div>

    </body>
</html>
