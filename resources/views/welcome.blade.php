    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="A modern Product Management System built with Laravel 12, PHP 8.2, Tailwind CSS, and Clean Architecture.">

        <title>{{ config('app.name', 'Product Management System') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100 text-gray-900 font-sans antialiased">

        <!-- Navbar -->
        <x-guest-header />

        <!-- Hero -->
        <section class="mx-auto max-w-7xl px-6 py-20 text-center lg:py-28">

            <span
                class="rounded-full bg-indigo-100 px-4 py-2 text-sm font-semibold text-indigo-700">
                Laravel 12 • PHP 8.2 • Tailwind CSS
            </span>

            <h1 class="mt-8 text-4xl font-bold tracking-tight sm:text-5xl lg:text-6xl">
                Enterprise Product Management System
            </h1>

            <p class="mx-auto mt-6 max-w-3xl text-lg leading-8 text-gray-600">
                A Laravel application built using clean architecture,
                repository pattern, service layer, role-based authorization,
                validation, and modern development practices.
            </p>

            @guest
                <div class="mt-10 flex flex-col justify-center gap-4 sm:flex-row">

                    <a href="{{ route('login') }}"
                        class="rounded-lg bg-indigo-600 px-8 py-3 font-semibold text-white shadow transition-colors duration-200 hover:bg-indigo-700">
                        Get Started
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="rounded-lg border border-gray-300 bg-white px-8 py-3 font-semibold transition-colors duration-200   hover:bg-gray-100">
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

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold">🔐 Authentication</h3>
                    <p class="mt-2 text-gray-600">
                        Secure login and registration using Laravel Breeze.
                    </p>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md">
                    <h3 class="text-lg font-semibold">📦 Product CRUD</h3>
                    <p class="mt-2 text-gray-600">
                        Complete product management with clean architecture.
                    </p>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md   ">
                    <h3 class="text-lg font-semibold">🔎 Product Search</h3>
                    <p class="mt-2 text-gray-600">
                        Search products quickly and efficiently.
                    </p>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md   ">
                    <h3 class="text-lg font-semibold">🛡 Role-Based Access</h3>
                    <p class="mt-2 text-gray-600">
                        Separate permissions for administrators and standard users.
                    </p>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md   ">
                    <h3 class="text-lg font-semibold">✅ Validation</h3>
                    <p class="mt-2 text-gray-600">
                        Robust validation using Laravel Form Requests.
                    </p>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm transition-all duration-200 hover:-translate-y-1 hover:shadow-md   ">
                    <h3 class="text-lg font-semibold">🏗 Clean Architecture</h3>
                    <p class="mt-2 text-gray-600">
                        Repository Pattern, Service Layer, SOLID Principles and Dependency Injection.
                    </p>
                </div>

            </div>

        </section>

        <!-- Tech Stack -->

        <section class="border-t bg-white py-16">

            <div class="mx-auto max-w-7xl px-6 text-center">

                <h2 class="text-3xl font-bold">
                    Technology Stack
                </h2>

                <div class="mt-8 flex flex-wrap justify-center gap-4">

                    <span class="rounded-full border border-gray-200 bg-white px-5 py-2 font-medium text-gray-700">Laravel 12</span>
                    <span class="rounded-full border border-gray-200 bg-white px-5 py-2 font-medium text-gray-700">PHP 8.2</span>
                    <span class="rounded-full border border-gray-200 bg-white px-5 py-2 font-medium text-gray-700">MySQL</span>
                    <span class="rounded-full border border-gray-200 bg-white px-5 py-2 font-medium text-gray-700">Tailwind CSS</span>
                    <span class="rounded-full border border-gray-200 bg-white px-5 py-2 font-medium text-gray-700   ">Blade</span>

                </div>

            </div>

        </section>

        <!-- Footer -->

        <x-footer />

    </body>

    </html>