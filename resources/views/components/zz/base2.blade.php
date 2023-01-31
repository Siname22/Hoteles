<html>
    <head>
        <meta charset='UTF-8'>
        <title>{{ $titulo ?? 'Título' }}</title>
        <link rel='stylesheet' href='{{ asset('css/Styles.css') }}'>
    </head>
    <body>
    <a id ='enlace_left' href='/inicio_cliente'><img src="/img/logofinal.png" id='logo_left'></a>
        <h1>{{ $encabezado ?? 'Encabezado' }}</h1>
        {{ $slot }}
    </body>
</html>
