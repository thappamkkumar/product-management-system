<nav class="border-b bg-white shadow-sm">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">

        <x-app-logo />

        <div class="flex items-center gap-3">

            @auth

                <a href="{{ route('dashboard') }}"
                    class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition-colors duration-200 hover:bg-indigo-700">
                    Dashboard
                </a>

            @else

                <a href="{{ route('login') }}"
                    class="rounded-lg border border-indigo-600 px-5 py-2 text-sm font-medium text-indigo-600 transition-colors duration-200 hover:bg-indigo-50">
                    Login
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-medium text-white transition-colors duration-200 hover:bg-indigo-700">
                        Register
                    </a>
                @endif

            @endauth

        </div>

    </div>

</nav>