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

<body class="min-h-screen bg-gray-100 font-sans text-gray-900 antialiased">

    <!-- Header -->
    <x-guest-header :back="route('home')" />

    <!-- Main Content -->
    <main class="flex min-h-[calc(100vh-145px)] items-center justify-center px-4 py-10">

        <div class="w-full max-w-md rounded-2xl border border-gray-100 bg-white p-8 shadow-lg">

            {{ $slot }}

        </div>

    </main>

    <!-- Footer -->
    <x-footer />

</body>

</html>