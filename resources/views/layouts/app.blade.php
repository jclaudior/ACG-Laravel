<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .imgLogo{
            height: 10%;
            width: 35%;
        }
        .greyColor{
            background-image: linear-gradient(#474545, #302a2a);
        }
    </style>
</head>
<body>
    <div id="app">
        @guest
            @component('layouts.componente_navbar')
                
            @endcomponent
        @else
            @if(Auth::user()->hasRole('admin'))
                @component('layouts.componente_navbar_admin')

                @endcomponent
            @else
                @component('layouts.componente_navbar_user')

                @endcomponent
            @endif
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
