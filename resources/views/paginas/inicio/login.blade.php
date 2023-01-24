<?php
?>

<html>
    <head>
        <title>Login</title>
        <link rel='stylesheet' href='\css\Styles.css'>
    </head>
    <body>
        <div id='div_logo'>
            <a href='/' id='div_logo'>
                <img src="/img/logofinal.png" id='logo' alt='logo M2H' title='M2H logo'>
            </a>
        </div>
        <br/>
        <br/>
        <br/>
        <div>
            <h1>INICIO DE SESIÓN</h1>
            <form method="get" action="rooms">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre">
                <br>
                <label for="pass">Contraseña:</label>
                <input type="text" id="pass">
                <br><br>
                <input type="submit">
            </form>
        </div>
    </body>
</html>
