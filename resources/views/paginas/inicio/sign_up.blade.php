<?php
?>

<html>
    <head>
        <title>Incio</title>
        <link rel='stylesheet' href='\css\Styles.css'>
    </head>
    <body>
        <div>
            <img src="logo.png">
        </div>
        <div>
            <h1>REGISTRO</h1>
            <form method="get" action="rooms">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre">

                <br>

                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos">

                <br>

                <label for="dni">DNI:</label>
                <input type="text" id="dni">

                <br>

                <label for="email">Enail:</label>
                <input type="text" id="email">

                <br>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono">

                <br>

                <label for="pass">Contraseña:</label>
                <input type="text" id="pass">

                <br><br>

                <input type="submit">
            </form>
        </div>
    </body>
</html>