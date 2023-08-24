<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('inc.head')
    </head>
    <body>
        @yield('content')
    </body>
</html>