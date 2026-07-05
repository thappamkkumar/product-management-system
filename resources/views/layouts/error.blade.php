<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>@yield('code') - @yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="flex min-h-screen items-center justify-center bg-gray-100 px-4">

    <div class="w-full max-w-lg rounded-2xl bg-white p-10 text-center shadow-lg">

        <h1 class="text-7xl font-extrabold text-indigo-600">
            @yield('code')
        </h1>

        <h2 class="mt-4 text-3xl font-bold text-gray-900">
            @yield('title')
        </h2>

        <p class="mt-4 text-gray-600">
            @yield('message')
        </p>

        <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

            <a
                href="{{ route('home') }}"
                class="rounded-lg bg-indigo-600 px-6 py-3 font-semibold text-white transition hover:bg-indigo-700"
            >
                Home
            </a>

            @if(auth()->check())

                <a
                    href="{{ route('dashboard') }}"
                    class="rounded-lg border border-gray-300 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-100"
                >
                    Dashboard
                </a>

            @endif

        </div>

    </div>

</body>

</html> 