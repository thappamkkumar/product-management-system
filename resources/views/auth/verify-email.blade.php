<x-guest-layout>

    <!-- Heading -->
    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-gray-900">
            Verify Your Email
        </h1>

        <p class="mt-2 text-sm text-gray-600">
            Thanks for signing up! Please verify your email address before accessing your account.
        </p>

    </div>

    @if (session('status') === 'verification-link-sent')

        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-sm text-green-700">

            A new verification link has been sent to your email address.

        </div>

    @endif

    <div class="space-y-6">

        <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 text-sm text-gray-600">

            Check your inbox and click the verification link we emailed to you.
            If you didn't receive the email, you can request another one below.

        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button class="flex w-full justify-center py-3">

                Resend Verification Email

            </x-primary-button>

        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-100"
            >
                Log Out
            </button>

        </form>

    </div>

</x-guest-layout>