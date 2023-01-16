<html lang='es'>
    <head>
        <title>{{ $titulo ?? 'Todo Manager' }}</title>
        <link rel='stylesheet' href='{{ asset('css/Styles.css') }}'>
    </head>
    <body>
        <x-zz.menu/>
        <h1>{{ $encabezado ?? 'Encabezado' }}</h1>
        {{ $slot }}
        <x-zz.pie/>
    </body>
</html>
