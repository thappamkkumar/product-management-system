<a href="{{ auth()->check() ? route('dashboard') : route('home') }}" class="flex items-center gap-3">

    <x-application-logo-svg class="h-10 w-10 text-indigo-600" />

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