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
     <!-- Header -->
    <header class="border-b bg-white shadow-sm">
        <div class="  flex   items-center justify-between px-6 py-4">

        

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
                
            <a href="{{ route('home') }}"
                class="rounded-lg border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100">
                ← Back   
            </a>
        </div>
    </header>
    <main class="flex min-h-screen flex-col items-center justify-center px-4 py-4">

       

        <!-- Card -->
        <div class="w-full max-w-md overflow-hidden rounded-xl bg-white px-8 py-6 shadow-lg">

            {{ $slot }}

        </div>

    </main>

    <!-- Footer -->
     <x-footer />
</body>

</html>