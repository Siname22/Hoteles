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
            <h1 id='h1_form_login'>INICIO DE SESIÓN</h1>
            <form method="get" action="rooms">
                <label id="label_login_txt" for="nombre">Nombre:</label>
                <input type="text" id="nombre">
                <br>

                <label id="label_login_txt" for="pass">Contraseña:</label>
                <input type="text" id="pass">
                <input type="submit"  value="Log In" id='login'>
            </form>
        </div>
    </body>
</html>
