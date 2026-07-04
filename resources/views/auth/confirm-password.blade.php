<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Confirm Password
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password to continue.
        </p>

    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
        @csrf

        <!-- Password -->
        <div>

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                class="mt-2 block w-full"
                type="password"
                name="password"
                required
                autofocus
                autocomplete="current-password"
                placeholder="Enter your password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <!-- Confirm Button -->

        <x-primary-button class="flex w-full justify-center py-3">

            Confirm Password

        </x-primary-button>

        <!-- Back to Login -->

        <p class="text-center text-sm text-gray-600">

            Return to

            <a
                href="{{ route('login') }}"
                class="font-semibold text-indigo-600 hover:text-indigo-700"
            >
                Login
            </a>

        </p>

    </form>

</x-guest-layout>