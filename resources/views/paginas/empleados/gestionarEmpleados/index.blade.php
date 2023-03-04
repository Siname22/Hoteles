<?php

?>

<html lang='es'>
<head>
    <title>Index Gestión de Empleados</title>
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

    <form action="employeeList">
        <input type="submit" value="LISTADO EMPLEADOS" id='listado_empleados' class="button">
    </form>

    <form action="createEmployee">
        <input type="submit" value="CREAR EMPLEADO" id='crear_empleado' class="button">
    </form>

    <form action="editEmployee">
        <input type="submit" value="EDITAR EMPLEADO" id='editar_empleado' class="button">
    </form>

</div>
</body>
</html>
