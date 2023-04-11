<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            {{config('app.name', 'A')}}
        </title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{asset('css/min/styles.min.css')}}">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        @yield('content')
    </body>
</html>
