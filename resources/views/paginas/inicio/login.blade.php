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
        <div id='div_form_white'>
            <h1 id='h1_form_login'>INICIO DE SESIÓN</h1>
            <form method="get" action="inicio_cliente">
                <label class="label" for="nombre">Nombre:</label>
                <input type="text" id="nombre" class='input'>
                <br>

                <label class="label" for="pass">Contraseña:</label>
                <input type="text" id="pass" class='input'>
                <div id='div_btn_submit'>
                    <input type="submit" value="Log In" id='btn_submit_login'>
                </div>
            </form>
        </div>
    </body>
</html>
