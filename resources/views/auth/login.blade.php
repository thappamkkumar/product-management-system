<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Heading -->
    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Welcome Back
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Sign in to access your Product Management System.
        </p>

    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email -->
        <div>

            <x-input-label
                for="email"
                :value="__('Email Address')"
            />

            <x-text-input
                id="email"
                class="mt-2 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="Enter your email"
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

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
                autocomplete="current-password"
                placeholder="Enter your password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between">

            <label
                for="remember_me"
                class="inline-flex items-center"
            >

                <input
                    id="remember_me"
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                >

                <span class="ml-2 text-sm text-gray-600">
                    Remember me
                </span>

            </label>

            @if (Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm font-medium text-indigo-600 hover:text-indigo-700"
                >
                    Forgot Password?
                </a>

            @endif

        </div>

        <!-- Login Button -->

        <x-primary-button class="flex w-full justify-center py-3">

            Log In

        </x-primary-button>

        <!-- Register -->

        @if (Route::has('register'))

            <p class="text-center text-sm text-gray-600">

                Don't have an account?

                <a
                    href="{{ route('register') }}"
                    class="font-semibold text-indigo-600 hover:text-indigo-700"
                >
                    Create Account
                </a>

            </p>

        @endif

    </form>

</x-guest-layout>