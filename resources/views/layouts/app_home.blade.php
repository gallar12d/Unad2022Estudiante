<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bamby</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>-->
    

    <!-- Fonts -->

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand|Arvo:400,700' rel='stylesheet' type='text/css'>
	<link href="{{ asset('kid/css/jquery.bxslider.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('kid/css/style.css') }}" />
</head>
<body>
<main class="py-4">
            @yield('content')
        </main>

   
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	
</body>
</html>
