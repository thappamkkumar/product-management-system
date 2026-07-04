<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans text-gray-900 antialiased overflow-auto">

    <div class="flex min-h-screen flex-col items-center justify-center px-4 py-4">

        <!-- Header -->
        <div class="mb-8 flex w-full max-w-md items-center justify-between">

            <a href="{{ route('home') }}"
                class="text-sm font-medium text-indigo-600 transition hover:text-indigo-800">
                ← Back to Home
            </a>

             

        </div>

        <!-- Card -->
        <div class="w-full max-w-md overflow-hidden rounded-xl bg-white px-8 py-6 shadow-lg">

            {{ $slot }}

        </div>

    </div>

</body>

</html>