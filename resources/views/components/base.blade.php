<html lang='es'>
    <head>
        <title>{{ $title ?? 'Todo Manager' }}</title>
        <link rel='stylesheet' href='{{ asset('css/Estilos.css') }}'>
    </head>
    <body>
        <x-menu/>
        <h1>{{ $titulo ?? 'Encabezado' }}</h1>
        {{ $slot }}
        <x-pie/>
    </body>
</html>
