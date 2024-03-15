<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    {{-- adds tailwind css --}}
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
    <style>
        .like-button:hover {
            transform: scale(1.1);
        }

        .like-button.active path {
            fill: rgb(201, 17, 17);
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .custom-button:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="bg-cover bg-center h-full">
    {{-- adds navigation bar --}}
    @include('layouts.navigation')

    {{-- adds content to the page --}}
    @yield('content')
</body>

</html>
