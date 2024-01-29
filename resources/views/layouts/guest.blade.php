<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="../../../resources/css/app.css"> -->
    @vite(['resources/css/app.css'])

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.4.2/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
</head>
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen authentication-bg flex flex-col justify-center relative">
        <div class="flex items-center justify-center mb-10">
            <img src="{{ Vite::asset('resources/images/auth-icon.png') }}" width="250" alt="logo" />
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            {{ $slot }}
        </div>
    </div>
</body>

</html>