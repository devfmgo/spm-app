<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('images/logonf.png')}}" type="image/x-icon">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    @vite('resources/css/app.css')

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('components/navbar')
        <div class="container mx-auto px-4 mt-24 mb-20">
            @yield('content')
        </div>
        <footer class="p-4 text-blue-700 text-center font-semibold text-sm">Copright&copy;2022 TIK SIT Nurul Fikri
        </footer>
    </div>
</body>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</html>