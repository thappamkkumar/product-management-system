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
            @if(session('success'))
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
                        class="rounded-lg bg-indigo-600 px-6 py-2 font-semibold text-white transition hover:bg-indigo-700"
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

            {{-- Product Count --}}
            <div class="mb-4 flex items-center justify-between">

                <p class="text-sm text-gray-600">
                    Total Products :
                    <span class="font-semibold text-indigo-600">
                        {{ $products->total() }}
                    </span>
                </p>

            </div>

            {{-- Products Table --}}
            <div class="overflow-x-auto rounded-xl bg-white shadow">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Title
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Price
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Available Date
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-gray-600">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">

                        @forelse($products as $product)

                            <tr class="transition hover:bg-gray-50">

                                <td class="px-6 py-4">

                                    <a
                                        href="{{ route('products.show', $product) }}"
                                        class="font-semibold text-indigo-600 hover:text-indigo-800"
                                    >
                                        {{ $product->title }}
                                    </a>

                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    ₹ {{ number_format($product->price, 2) }}
                                </td>

                                <td class="px-6 py-4 text-gray-700">
                                    {{ $product->date_available->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a
                                            href="{{ route('products.show', $product) }}"
                                            class="rounded-md bg-blue-100 px-3 py-1 text-sm text-blue-700 hover:bg-blue-200"
                                        >
                                            View
                                        </a>

                                        @can('update', $product)

                                            <a
                                                href="{{ route('products.edit', $product) }}"
                                                class="rounded-md bg-yellow-100 px-3 py-1 text-sm text-yellow-700 hover:bg-yellow-200"
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
                                                    class="rounded-md bg-red-100 px-3 py-1 text-sm text-red-700 hover:bg-red-200"
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
                                    class="px-6 py-16 text-center"
                                >

                                    <div class="text-lg font-semibold text-gray-500">
                                        No products found.
                                    </div>

                                    <p class="mt-2 text-sm text-gray-400">
                                        Try another search or create a new product.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}
            @if($products->hasPages())

                <div class="mt-6 rounded-xl bg-white p-4 shadow">

                    <div class="flex flex-col items-center justify-between gap-4 md:flex-row">

                        <p class="text-sm text-gray-600">
                            Showing
                            <span class="font-semibold text-gray-900">
                                {{ $products->firstItem() }}
                            </span>
                            to
                            <span class="font-semibold text-gray-900">
                                {{ $products->lastItem() }}
                            </span>
                            of
                            <span class="font-semibold text-gray-900">
                                {{ $products->total() }}
                            </span>
                            products
                        </p>

                        {{ $products->onEachSide(1)->links() }}

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>