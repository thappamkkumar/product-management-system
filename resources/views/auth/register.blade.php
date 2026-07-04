<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Create Account
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Join the Product Management System and start managing products securely.
        </p>

    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>

            <x-input-label
                for="name"
                :value="__('Full Name')"
            />

            <x-text-input
                id="name"
                class="mt-2 block w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Enter your full name"
            />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2"
            />

        </div>

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
                autocomplete="new-password"
                placeholder="Create a password"
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
                placeholder="Confirm your password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        <!-- Register Button -->

        <x-primary-button class="flex w-full justify-center py-3">

            Create Account

        </x-primary-button>

        <!-- Login -->

        <p class="text-center text-sm text-gray-600">

            Already have an account?

            <a
                href="{{ route('login') }}"
                class="font-semibold text-indigo-600 hover:text-indigo-700"
            >
                Sign In
            </a>

        </p>

    </form>

</x-guest-layout>