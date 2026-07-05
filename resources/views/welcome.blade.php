<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Product Management System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased">

    <!-- Navbar -->
    <nav class="border-b bg-white shadow-sm">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
 
            <a
                href="{{ route('home') }}"
                class="flex items-center gap-3"
            >

                <x-application-logo
                    class="h-10 w-10 text-indigo-600"
                />

                <div>

                    {{-- Desktop --}}
                    <div class="hidden sm:block">

                        <h1 class="text-lg font-bold leading-none text-gray-900">
                            Product Management
                        </h1>

                        <p class="text-xs text-gray-500">
                            System
                        </p>

                    </div>

                    {{-- Mobile --}}
                    <div class="sm:hidden">

                        <h1 class="text-lg font-bold text-gray-900">
                            PMS
                        </h1>

                    </div>

                </div>

            </a>

            <div class="flex items-center gap-1 sm:gap-3">

                @auth
                    <a href="{{ route('dashboard') }}"
                        class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white hover:bg-indigo-700">
                        Dashboard
                    </a>
                @else

                    <a href="{{ route('login') }}"
                        class="rounded-lg border border-indigo-600 px-3 sm:px-5 py-2 text-xs sm:text-sm font-medium text-indigo-600 hover:bg-indigo-50">
                        Login
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-lg bg-indigo-600 px-3 sm:px-5 py-2 text-xs sm:text-sm font-medium text-white hover:bg-indigo-700">
                            Register
                        </a>
                    @endif

                @endauth

            </div>

        </div>
    </nav>

    <!-- Hero -->
    <section class="mx-auto max-w-7xl px-6 py-24 text-center">

        <span
            class="rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
            Laravel 12 • PHP 8.2 • Tailwind CSS
        </span>

        <h1 class="mt-8 text-5xl font-bold tracking-tight">
            Enterprise Product Management System
        </h1>

        <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-gray-600">
            A Laravel application built using clean architecture,
            repository pattern, service layer, role-based authorization,
            validation, and modern development practices.
        </p>

        @guest
            <div class="mt-10 flex justify-center gap-4">

                <a href="{{ route('login') }}"
                    class="rounded-lg bg-indigo-600 px-8 py-3 font-semibold text-white shadow hover:bg-indigo-700">
                    Get Started
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-lg border border-gray-300 bg-white px-8 py-3 font-semibold hover:bg-gray-100">
                        Register
                    </a>
                @endif

            </div>
        @endguest

    </section>

    <!-- Features -->

    <section class="mx-auto max-w-7xl px-6 pb-24">

        <div class="mb-12 text-center">

            <h2 class="text-3xl font-bold">
                Features
            </h2>

            <p class="mt-2 text-gray-500">
                Built following Laravel best practices.
            </p>

        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">🔐 Authentication</h3>
                <p class="mt-2 text-gray-600">
                    Secure login and registration using Laravel Breeze.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">📦 Product CRUD</h3>
                <p class="mt-2 text-gray-600">
                    Complete product management with clean architecture.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">🔎 Product Search</h3>
                <p class="mt-2 text-gray-600">
                    Search products quickly and efficiently.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">🛡 Role-Based Access</h3>
                <p class="mt-2 text-gray-600">
                    Separate permissions for administrators and standard users.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">✅ Validation</h3>
                <p class="mt-2 text-gray-600">
                    Robust validation using Laravel Form Requests.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm">
                <h3 class="text-lg font-semibold">🏗 Clean Architecture</h3>
                <p class="mt-2 text-gray-600">
                    Repository Pattern, Service Layer, SOLID Principles and Dependency Injection.
                </p>
            </div>

        </div>

    </section>

    <!-- Tech Stack -->

    <section class="bg-white py-16">

        <div class="mx-auto max-w-7xl px-6 text-center">

            <h2 class="text-3xl font-bold">
                Technology Stack
            </h2>

            <div class="mt-8 flex flex-wrap justify-center gap-4">

                <span class="rounded-full bg-gray-100 px-5 py-2 font-medium">Laravel 12</span>
                <span class="rounded-full bg-gray-100 px-5 py-2 font-medium">PHP 8.2</span>
                <span class="rounded-full bg-gray-100 px-5 py-2 font-medium">MySQL</span>
                <span class="rounded-full bg-gray-100 px-5 py-2 font-medium">Tailwind CSS</span>
                <span class="rounded-full bg-gray-100 px-5 py-2 font-medium">Blade</span>

            </div>

        </div>

    </section>

    <!-- Footer -->

    <x-footer />

</body>

</html>