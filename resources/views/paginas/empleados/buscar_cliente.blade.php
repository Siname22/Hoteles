<html lang='es'>
<head>
    <title>Busqueda de Clientes</title>
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
    <h1>BUSCAR CLIENTES</h1>
    <div id='div_buscador_cliente'>
        <input type='search' placeholder='Search client' id='buscador_cliente'>
        <button>&#8594;</button>
    </div>
    <form action='{{ route('clients.create') }}'>
        <input type="submit" value='CREAR CLIENTE' id='crear_cliente'>
    </form>
</body>
</html>
