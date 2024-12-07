<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <title>{{ $title ?? config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-body">

    <x-navbar />

    {{ $slot }}

    @filamentScripts
    @vite('resources/js/app.js')

    <script type="module">
        $(window).scroll(function(){
            if ($(this).scrollTop()) {
                $('#navbar').addClass('bg-white');
                $('#navbar').addClass('shadow-sm');
                $('#navbar').addClass('py-3');
                $('#nav-list').removeClass('text-white');
            } else {
                $('#navbar').removeClass('bg-white');
                $('#navbar').removeClass('shadow-sm');
                $('#navbar').removeClass('py-3');
                $('#nav-list').addClass('text-white');
            }
        });
    </script>
</body>

</html>
