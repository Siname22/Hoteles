<?php
?>

<html>
    <head>
        <title>SignUp</title>
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
        <div id='div_form_white'>
            <h1 id='h1_form_white'>REGISTRO</h1>
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

                <div id='div_btn_submit'>
                    <input type="submit" id='btn_submit_signup'>
                </div>

            </form>
        </div>
    </body>
</html>
