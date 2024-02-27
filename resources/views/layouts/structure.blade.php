<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    {{-- adds tailwind css --}}
    @vite('resources/css/app.css')
    <title>{{ config('app.name') }}</title>
</head>

<body>
    {{-- adds navigation bar --}}
    @include('layouts.navigation')

    {{-- adds content to the page --}}
    @yield('content')
</body>

</html>
