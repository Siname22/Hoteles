<html>
    <head>
        <meta charset='UTF-8'>
        <title>{{ $titulo ?? 'Título' }}</title>
        <link rel='stylesheet' href='{{ asset('css/Styles.css') }}'>
    </head>
    <body>
        <a id ='enlace_left' href='/clientHome'><img src="/img/logofinal.png" id='logo_left'></a>
        <form action='{{ route('user.logout') }}' method='get'>
            <input type='submit'  value='Cerrar sesión' class='button'/>
        </form>
        <h1>{{ $encabezado ?? 'Encabezado' }}</h1>
        {{ $slot }}
    </body>
</html>
