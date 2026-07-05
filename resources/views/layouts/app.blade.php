<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <meta name="description"
        content="A modern Product Management System built with Laravel 12, PHP 8.2, Tailwind CSS, and Clean Architecture.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen flex-col">

        <!-- Navigation -->
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="border-b bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <x-footer />

    </div>

</body>

</html>