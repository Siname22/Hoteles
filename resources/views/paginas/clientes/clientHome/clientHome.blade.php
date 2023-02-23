<?php

?>

<html lang='es'>
    <head>
        <title>M2H Hoteles - Inicio</title>
        <link rel='stylesheet' href='\css\Styles.css'>
    </head>
<body>
    <div id='div_logo'>
        <a id='div_logo'>
            <img src="/img/logofinal.png" id='logo'>
        </a>
    </div>
    <br/>
    <br/>
    <br/>
    <div id='div_form_cliente'>
        <form action="{{ route('bookings') }}" method="post">
            @csrf
            <input type="submit" value="VER MIS RESERVAS" id='ver_reserva'>
        </form>
        <form action="{{ route('rooms.filter_create') }}" method="post">
            @csrf
            <input type="submit" value="HACER UNA RESERVA" id='hacer_reserva'>
        </form>
    </div>
</body>
</html>
