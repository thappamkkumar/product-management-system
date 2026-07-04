<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <!-- Heading -->
    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Forgot Password
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Enter your email address and we'll send you a password reset link.
        </p>

    </div>

    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
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

        <!-- Submit Button -->

        <x-primary-button class="flex w-full justify-center py-3">

            Send Reset Link

        </x-primary-button>

        <!-- Back to Login -->

        <p class="text-center text-sm text-gray-600">

            Remember your password?

            <a
                href="{{ route('login') }}"
                class="font-semibold text-indigo-600 hover:text-indigo-700"
            >
                Sign In
            </a>

        </p>

    </form>

</x-guest-layout>