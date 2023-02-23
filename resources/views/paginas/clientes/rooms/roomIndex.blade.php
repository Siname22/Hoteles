<?php

?>

<html lang='es'>
<head>
    <title>Index Gestión de Habitaciones</title>
    <link rel='stylesheet' href='\css\Styles.css'>
</head>
<body>
<div id='div_logo'>
    <a id='div_logo'>
        <img src="/img/logofinal.png" id='logo' alt='logo M2H' title='M2H logo'>
    </a>
</div>
<br/>
<br/>
<br/>
<div id='div_form_empleado'>

    <form action="/rooms/filter{id}">
        <input type="submit" value="LISTADO HABITACIONES" id='listado_habitacion' class="button">
    </form>

    <form action="createEmployee">
        <input type="submit" value="CREAR HABITACIÓN" id='crear_habitacion' class="button">
    </form>

    <form action="editEmployee">
        <input type="submit" value="EDITAR HABITACIÓN" id='editar_habitacion' class="button">
    </form>

</div>
</body>
</html>
