<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Guarapuava do Bem</title>
        <meta name="description" content="Guarapuva do Bem">
        <meta name="author" content="Rotaract Guarapuava">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    </head>

    <body>
        @include('layouts.partials.header')
        <div class="wrapper">
            
            @include('layouts.partials.nav')

            <div id="main-content">
                
                <div class="container-fluid">
                    @yield('content')    
                </div>
                
            </div>
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>