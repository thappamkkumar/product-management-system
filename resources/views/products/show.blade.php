<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-900">
                Product Details
            </h2>

            <a
                href="{{ route('products.index') }}"
                class="rounded-lg border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100"
            >
                ← Back
            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

            <div class="rounded-xl bg-white shadow">

                <div class="border-b p-6">
                    <h3 class="text-2xl font-bold">
                        {{ $product->title }}
                    </h3>
                </div>

                <div class="space-y-6 p-6">

                    <div>
                        <p class="text-sm font-semibold text-gray-500">
                            Description
                        </p>

                        <div class="prose max-w-none mt-2">
                            {!! $product->description !!}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Price
                            </p>

                            <p class="mt-2">
                                ₹ {{ number_format($product->price, 2) }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Available Date
                            </p>

                            <p class="mt-2">
                                {{ $product->date_available->format('d M Y') }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Created At
                            </p>

                            <p class="mt-2">
                                {{ $product->created_at->format('d M Y h:i A') }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm font-semibold text-gray-500">
                                Updated At
                            </p>

                            <p class="mt-2">
                                {{ $product->updated_at->format('d M Y h:i A') }}
                            </p>

                        </div>

                    </div>

                </div>

                <div class="flex gap-3 border-t p-6">

                    @can('update', $product)

                        <a
                            href="{{ route('products.edit', $product) }}"
                            class="rounded-lg bg-yellow-500 px-5 py-2 font-semibold text-white hover:bg-yellow-600"
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
                                class="rounded-lg bg-red-600 px-5 py-2 font-semibold text-white hover:bg-red-700"
                            >
                                Delete
                            </button>

                        </form>

                    @endcan

                </div>

            </div>

        </div>

    </div>

</x-app-layout>