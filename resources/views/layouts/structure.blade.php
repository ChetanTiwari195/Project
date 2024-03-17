<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bad+Script&family=Courgette&family=Dangrek&family=Sniglet&display=swap"
        rel="stylesheet">
    {{-- adds tailwind css --}}
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
    <style>
        body {
            font-family: 'Courgette';
        }

        .select {
            background-color:red;
        }

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

<body class="bg-cover bg-center h-full bg-gradient-to-r from-purple-200 via-blue-300 to-red-200 ">
    {{-- adds navigation bar --}}
    @include('layouts.navigation')

    {{-- adds content to the page --}}
    @yield('content')
</body>

</html>
