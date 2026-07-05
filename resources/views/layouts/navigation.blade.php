<nav x-data="{ open: false }" class="border-b border-gray-200 bg-white shadow-sm">

    <div class="mx-auto max-w-7xl px-6 py-4"">

        <div class="flex h-18 items-center justify-between ">

            <!-- Left Side -->
            <div class="flex items-center gap-8">

                <!-- Logo -->
                 <x-app-logo />
 </div>
                <!-- Navigation -->
                <div class="hidden items-center gap-8 sm:flex">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        Dashboard
                    </x-nav-link>

                    <x-nav-link
                        :href="route('products.index')"
                        :active="request()->routeIs('products.*')"
                    >
                        Products
                    </x-nav-link>

                </div>

           

            <!-- User Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                           class="inline-flex items-center gap-2 rounded-lg border border-transparent bg-white px-3 py-2 text-sm font-medium text-gray-700 transition-colors duration-200 hover:text-indigo-600 focus:outline-none">

                            <div class="font-semibold">
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-2">

                                <svg
                                    class="h-4 w-4 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">

                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />

                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link
                            :href="route('profile.edit')"
                        >
                            Profile
                        </x-dropdown-link>

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                Log Out
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Mobile Button -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center rounded-lg p-2 text-gray-500 transition hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none">

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- Mobile Navigation -->

    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden"
    >

        <div class="space-y-1 px-3 py-3">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('products.index')"
                :active="request()->routeIs('products.*')"
            >
                Products
            </x-responsive-nav-link>

        </div>

       <div class="border-t border-gray-200 px-3 py-4">

            <div class="px-4">

                <div class="font-semibold text-gray-900">
                    {{ Auth::user()->name }}
                </div>

                <div class="text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link
                    :href="route('profile.edit')"
                >
                    Profile
                </x-responsive-nav-link>

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Log Out
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>