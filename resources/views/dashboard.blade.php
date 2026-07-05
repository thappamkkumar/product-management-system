<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-900">
                Dashboard
            </h2>

            <div class="text-right">

                <p class="text-sm text-gray-500">

                    Welcome,

                    <span class="font-semibold text-gray-900">

                        {{ $user->name }}

                    </span>

                    @if($isAdmin)

                        <span class="ml-2 rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700">
                            Admin
                        </span>

                    @endif

                </p>

            </div>

        </div>

    </x-slot>

    <div class="py-8">

        <div class="mx-auto max-w-7xl space-y-8 px-4 sm:px-6 lg:px-8">

            {{-- Statistics --}}
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 {{ $isAdmin ? 'xl:grid-cols-4' : '' }}">

                {{-- Total Products --}}
                <div class="rounded-xl bg-white p-6 shadow">

                    <p class="text-sm font-medium text-gray-500">
                        Total Products
                    </p>

                    <h3 class="mt-3 text-3xl font-bold text-indigo-600">
                        {{ $totalProducts }}
                    </h3>

                </div>

                @if($isAdmin)

                    {{-- Total Users --}}
                    <div class="rounded-xl bg-white p-6 shadow">

                        <p class="text-sm font-medium text-gray-500">
                            Total Users
                        </p>

                        <h3 class="mt-3 text-3xl font-bold text-green-600">
                            {{ $totalUsers }}
                        </h3>

                    </div>

                    {{-- Products Today --}}
                    <div class="rounded-xl bg-white p-6 shadow">

                        <p class="text-sm font-medium text-gray-500">
                            Products Today
                        </p>

                        <h3 class="mt-3 text-3xl font-bold text-blue-600">
                            {{ $productsToday }}
                        </h3>

                    </div>

                    {{-- Products This Month --}}
                    <div class="rounded-xl bg-white p-6 shadow">

                        <p class="text-sm font-medium text-gray-500">
                            Products This Month
                        </p>

                        <h3 class="mt-3 text-3xl font-bold text-purple-600">
                            {{ $productsThisMonth }}
                        </h3>

                    </div>

                @endif

            </div>

            {{-- Dashboard Content --}}
            <div class="grid grid-cols-1 gap-6 {{ $isAdmin ? 'lg:grid-cols-3' : '' }}">

                {{-- Quick Actions --}}
                @if($isAdmin)

                    <div class="rounded-xl bg-white p-6 shadow">

                        <h3 class="text-lg font-bold text-gray-900">
                            Quick Actions
                        </h3>

                        <p class="mb-5 text-sm text-gray-500">
                            Frequently used product management actions.
                        </p>

                        <div class="space-y-3">

                            @can('create', App\Models\Product::class)

                                <a
                                    href="{{ route('products.create') }}"
                                    class="block rounded-lg bg-indigo-600 px-4 py-3 text-center font-medium text-white transition hover:bg-indigo-700"
                                >
                                    + Add Product
                                </a>

                            @endcan

                            <a
                                href="{{ route('products.index') }}"
                                class="block rounded-lg border border-gray-300 px-4 py-3 text-center font-medium text-gray-700 transition hover:bg-gray-100"
                            >
                                Manage Products
                            </a>

                        </div>

                    </div>

                @endif

                {{-- Recently Added Products --}}
                <div class="rounded-xl bg-white shadow {{ $isAdmin ? 'lg:col-span-2' : '' }}">

                    <div class="flex items-center justify-between border-b px-6 py-5">

                        <div>

                            <h3 class="text-lg font-bold text-gray-900">
                                Recently Added Products
                            </h3>

                            <p class="text-sm text-gray-500">
                                Latest 5 products
                            </p>

                        </div>

                        <a
                            href="{{ route('products.index') }}"
                            class="text-sm font-semibold text-indigo-600 hover:text-indigo-800"
                        >
                            View All →
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-50">

                                <tr>

                                    <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Title
                                    </th>

                                    <th class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Price
                                    </th>

                                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Added
                                    </th>

                                    <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">

                                @forelse($recentProducts as $product)

                                    <tr class="transition hover:bg-gray-50">

                                        <td class="px-6 py-4">

                                            <a
                                                href="{{ route('products.show', $product) }}"
                                                class="font-semibold text-indigo-600 hover:text-indigo-800"
                                            >
                                                {{ Str::limit($product->title, 40) }}
                                            </a>

                                        </td>

                                        <td class="px-6 py-4 text-right text-gray-700">

                                            ₹ {{ number_format($product->price, 2) }}

                                        </td>

                                        <td class="px-6 py-4 text-center text-gray-700">

                                            {{ $product->created_at->diffForHumans() }}

                                        </td>

                                        <td class="px-6 py-4">

                                            <div class="flex justify-center">

                                                <a
                                                    href="{{ route('products.show', $product) }}"
                                                    class="rounded-md bg-blue-100 px-3 py-1 text-sm text-blue-700 transition hover:bg-blue-200"
                                                >
                                                    View
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="4"
                                            class="px-6 py-16 text-center"
                                        >

                                            <div class="text-lg font-semibold text-gray-500">
                                                No recent products found.
                                            </div>

                                            <p class="mt-2 text-sm text-gray-400">
                                                Products you create will appear here.
                                            </p>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>