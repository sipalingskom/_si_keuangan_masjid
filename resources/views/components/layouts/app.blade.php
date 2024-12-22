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
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-Bv8A6Fvd.css') }}">
    <style>
        .swal2-input-label {
            font-weight: bold;
            font-size: 16px;
        }

        .swal2-input {
            border: solid 1px #eaeaea;
            margin: 10px 20px;
            border-radius: 10px;
        }

        .swal2-confirm.swal2-styled {
            background-color: #13ADB7 !important;
            border: #13ADB7 !important;
        }

        .fc-h-event {
            background-color: #13ADB7 !important;
            border: #13ADB7 !important;
        }

        .fc-toolbar-chunk .fc-toolbar-title#fc-dom-1 {
            font-weight: 700 !important;
            color: #13adb7 !important;
            font-size: 22px !important;
        }

        .fc-toolbar-chunk .fc-today-button,
        .fc-toolbar-chunk .fc-next-button,
        .fc-toolbar-chunk .fc-prev-button {
            background-color: #13ADB7;
            border: #13ADB7;
        }

        .fc-toolbar-chunk .fc-today-button:hover {
            background-color: #068993;
            border: #068993;
        }

        .fc-toolbar-chunk .fc-today-button:disabled {
            background-color: #39b4bc;
            border: #39b4bc;
        }

        @media only screen and (max-width: 425px) {
            .fc-header-toolbar.fc-toolbar {
                display: flex;
                flex-direction: column;
            }
        }
    </style>
</head>

<body class="antialiased bg-body">

    {{--
    <livewire:navbar /> --}}
    @livewire('navbar')
    {{ $slot }}

    @livewire('notifications')


    @filamentScripts
    {{-- @vite('resources/js/app.js') --}}
    <script src="{{ asset('build/assets/app-Dh1BrTWI.js') }}"></script>

    <script type="module">
        $(window).on('hashchange', function(e){
            history.replaceState ("", document.title, e.originalEvent.oldURL);
        });

        $(window).scroll(function(){
            if ($(this).scrollTop()) {
                $('#backtotop').removeClass('hidden');
                $('#navbar').addClass('bg-white');
                $('#navbar').addClass('shadow-sm');
                $('#navbar').addClass('py-3');
                $('#nav-list').removeClass('text-white');
            } else {
                $('#backtotop').addClass('hidden');
                $('#navbar').removeClass('bg-white');
                $('#navbar').removeClass('shadow-sm');
                $('#navbar').removeClass('py-3');
                $('#nav-list').addClass('text-white');
            }
        });
    </script>

    @stack('scripts')

</body>

</html>
