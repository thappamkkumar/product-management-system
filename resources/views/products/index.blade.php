<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-900">
                Products
            </h2>

            @can('create', App\Models\Product::class)
                <a
                    href="{{ route('products.create') }}"
                    class="rounded-lg bg-indigo-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700"
                >
                    + Add Product
                </a>
            @endcan

        </div>
    </x-slot>

    <div class="py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if (session('success'))

                <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">

                    {{ session('success') }}

                </div>

            @endif

            {{-- Search --}}
            <div class="mb-6 rounded-xl bg-white p-6 shadow">

                <form
                    action="{{ route('products.index') }}"
                    method="GET"
                    class="flex flex-col gap-4 md:flex-row"
                >

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search products..."
                        class="flex-1 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                    >

                    <button
                        type="submit"
                        class="rounded-lg bg-indigo-600 px-6 py-2 font-semibold text-white hover:bg-indigo-700"
                    >
                        Search
                    </button>

                    @if(request()->filled('search'))

                        <a
                            href="{{ route('products.index') }}"
                            class="rounded-lg border border-gray-300 px-6 py-2 text-center hover:bg-gray-100"
                        >
                            Clear
                        </a>

                    @endif

                </form>

            </div>

            {{-- Products Table --}}
            <div class="overflow-hidden rounded-xl bg-white shadow">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Title
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Price
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Available Date
                            </th>

                            <th class="px-6 py-3 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">

                        @forelse($products as $product)

                            <tr>

                                <td class="px-6 py-4">

                                    {{ $product->title }}

                                </td>

                                <td class="px-6 py-4">

                                    ₹ {{ number_format($product->price, 2) }}

                                </td>

                                <td class="px-6 py-4">

                                    {{ $product->date_available->format('d M Y') }}

                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('products.show', $product) }}"
                                            class="rounded bg-blue-100 px-3 py-1 text-sm text-blue-700 hover:bg-blue-200"
                                        >
                                            View
                                        </a>

                                        @can('update', $product)

                                            <a
                                                href="{{ route('products.edit', $product) }}"
                                                class="rounded bg-yellow-100 px-3 py-1 text-sm text-yellow-700 hover:bg-yellow-200"
                                            >
                                                Edit
                                            </a>

                                        @endcan

                                        @can('delete', $product)

                                            <form
                                                action="{{ route('products.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Delete this product?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="rounded bg-red-100 px-3 py-1 text-sm text-red-700 hover:bg-red-200"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        @endcan

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="px-6 py-10 text-center text-gray-500"
                                >

                                    No products found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>