<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-gray-900">
                Edit Product
            </h2>

            <a
                href="{{ url()->previous() }}"
                class="rounded-lg border border-gray-300 px-5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100"
            >
                ← Back
            </a>

        </div>
    </x-slot>

    <div class="py-8">

        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="rounded-xl bg-white p-8 shadow">

                <form
                    action="{{ route('products.update', $product) }}"
                    method="POST"
                    class="space-y-6"
                >
                    @csrf
                    @method('PUT')

                    <!-- Title -->
                    <div>

                        <label
                            for="title"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Product Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $product->title) }}"
                            placeholder="Enter product title"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >

                        @error('title')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Description -->
                    <div>

                        <label
                            for="description"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Enter product description"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Price -->
                    <div>

                        <label
                            for="price"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Price
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            id="price"
                            name="price"
                            value="{{ old('price', $product->price) }}"
                            placeholder="0.00"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >

                        @error('price')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Available Date -->
                    <div>

                        <label
                            for="date_available"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Available Date
                        </label>

                        <input
                            type="date"
                            id="date_available"
                            name="date_available"
                            value="{{ old('date_available', $product->date_available->format('Y-m-d')) }}"
                            class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                        >

                        @error('date_available')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Buttons -->
                    <div class="flex items-center gap-4">

                        <button
                            type="submit"
                            class="rounded-lg bg-indigo-600 px-6 py-2 font-semibold text-white hover:bg-indigo-700"
                        >
                            Update Product
                        </button>

                        <a
                            href="{{ route('products.show', $product) }}"
                            class="rounded-lg border border-gray-300 px-6 py-2 font-medium text-gray-700 hover:bg-gray-100"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>