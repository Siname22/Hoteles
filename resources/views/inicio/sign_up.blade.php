<?php
?>

<html>

<div>
    <img src="logo.png">
</div>
<div>
    <h1>REGISTRO</h1>
    <form method="get" action="resources/views/paginas/rooms/index.blade.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre">
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos">
        <label for="dni">DNI:</label>
        <input type="text" id="dni">
        <label for="email">Enail:</label>
        <input type="text" id="email">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono">
        <label for="pass">Contraseña:</label>
        <input type="text" id="pass">
        <br>
        <input type="submit">
    </form>
</div>
</html>
