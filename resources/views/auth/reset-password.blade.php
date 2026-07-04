<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Reset Password
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Create a new password for your account.
        </p>

    </div>

    <form method="POST" action="{{ route('password.store') }}" class="space-y-6">
        @csrf

        <!-- Password Reset Token -->
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

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
                :value="old('email', $request->email)"
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
                :value="__('New Password')"
            />

            <x-text-input
                id="password"
                class="mt-2 block w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
                placeholder="Create a new password"
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <!-- Confirm Password -->
        <div>

            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
            />

            <x-text-input
                id="password_confirmation"
                class="mt-2 block w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirm your new password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <!-- Submit Button -->

        <x-primary-button class="flex w-full justify-center py-3">

            Reset Password

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