<?php
?>

<html>

    <div>
        <img src="logo.png">
    </div>
    <div>
        <h1>INICIO DE SESIÓN</h1>
        <form method="get" action="resources/views/paginas/rooms/index.blade.php">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre">
            <label for="pass">Contraseña:</label>
            <input type="text" id="pass">
            <br>
            <input type="submit">
        </form>
    </div>
</html>
