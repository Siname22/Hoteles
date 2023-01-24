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
            <h1 id='h1_form_signup'>REGISTRO</h1>
            <form method="get" action="rooms">
                <label for="nombre" class='label'>Nombre:</label>
                <input type="text" id="nombre" class='input'>

                <br>

                <label for="apellidos" class='label'>Apellidos:</label>
                <input type="text" id="apellidos" class='input'>

                <br>

                <label for="dni" class='label'>DNI:</label>
                <input type="text" id="dni" class='input'>

                <br>

                <label for="email" class='label'>Enail:</label>
                <input type="text" id="email" class='input'>

                <br>

                <label for="telefono" class='label'>Teléfono:</label>
                <input type="text" id="telefono" class='input'>

                <br>

                <label for="pass" class='label'>Contraseña:</label>
                <input type="text" id="pass" class='input'>

                <br><br>

                <div id='div_btn_submit'>
                    <input type="submit" id='btn_submit_signup'>
                </div>

            </form>
        </div>
    </body>
</html>
