<x-frontend-layout>
    <style>
        :root {
            --primary-color: #009900;
            --secondary-color: #ffcc33;
            --ancient-color: #202020;
            --paragraph: #333333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--paragraph);
            background-color: #f9f9f9;
        }

        p {
            color: var(--paragraph);
            font-size: 14px;
        }

        .container {
            width: 86%;
            margin: auto;
        }

        /* Custom color classes */
        .text-primary { color: var(--primary-color); }
        .text-ancient { color: var(--ancient-color); }
        .text-paragraph { color: var(--paragraph); }
        .bg-primary { background-color: var(--primary-color); }
        .bg-secondary { background-color: var(--secondary-color); }
        .border-primary { border-color: var(--primary-color); }
        .bg-gradient-custom { background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); }
        .underline-gradient { background: linear-gradient(90deg, var(--primary-color), var(--secondary-color)); }

        /* Focus states */
        .focus-primary:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 153, 0, 0.1);
        }

        /* Hover effects */
        .hover-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
        }
    </style>

    <section class="min-h-screen py-8" style="background-color: #f9f9f9;">
        <div class="container py-10">
            <!-- Header Section -->
            <div class="flex justify-between items-start mb-8">
                <!-- Title Section -->
                <div class="flex-1">
                    <h1 class="text-2xl lg:text-3xl font-bold text-ancient mb-2 relative">
                        Search Result for "{{ $q }}"
                        <div class="absolute -bottom-1 left-0 w-12 h-1 underline-gradient rounded-full"></div>
                    </h1>
                    <p class="text-paragraph opacity-70 text-sm">
                        Found {{ count($products) }} products matching your search
                    </p>
                </div>

                <!-- Price Filter Form -->
                <div class="ml-8">
                    <div class="flex items-center gap-2 mb-3">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span class="text-sm font-medium text-primary">Price Filter</span>
                    </div>

                    <form action="{{ route('compare') }}" method="get" class="flex items-end gap-3">
                        <!-- Min Price Input -->
                        <div class="w-32">
                            <label for="min" class="block text-xs font-medium text-paragraph opacity-80 mb-1 uppercase tracking-wide">
                                Min Price
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-paragraph opacity-60 text-sm">रू</span>
                                <input
                                    type="number"
                                    name="min"
                                    id="min"
                                    value="{{ $min ?? '' }}"
                                    placeholder="0"
                                    class="w-full pl-8 pr-3 py-2 bg-white border border-gray-300 rounded-md text-sm placeholder-gray-400 focus-primary transition-all duration-200"
                                >
                            </div>
                        </div>

                        <!-- Max Price Input -->
                        <div class="w-32">
                            <label for="max" class="block text-xs font-medium text-paragraph opacity-80 mb-1 uppercase tracking-wide">
                                Max Price
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-paragraph opacity-60 text-sm">रू</span>
                                <input
                                    type="number"
                                    name="max"
                                    id="max"
                                    value="{{ $max ?? '' }}"
                                    placeholder="∞"
                                    class="w-full pl-8 pr-3 py-2 bg-white border border-gray-300 rounded-md text-sm placeholder-gray-400 focus-primary transition-all duration-200"
                                >
                            </div>
                        </div>

                        <!-- Hidden Query Input -->
                        <input type="text" name="q" value="{{ $q }}" hidden>

                        <!-- Filter Button -->
                        <button
                            type="submit"
                            class="px-5 py-2 bg-gradient-custom text-white font-medium text-sm rounded-md shadow-sm hover-primary transition-all duration-200 flex items-center gap-2 whitespace-nowrap"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Filter Products
                        </button>
                    </form>
                </div>
            </div>

            <!-- Products Grid Section -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8 py-10">
                @foreach ($products as $product)
                    <div class="transform hover:scale-105 transition-transform duration-300">
                        <x-product-card :product="$product" class="shadow-sm hover:shadow-md transition-shadow duration-300" />
                    </div>
                @endforeach
            </div>

            <!-- Empty State -->
            @if(count($products) === 0)
                <div class="text-center py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <h3 class="text-xl font-semibold text-ancient mb-2">No products found</h3>
                        <p class="text-paragraph opacity-70 mb-6">
                            Try adjusting your search criteria or price range to find more products.
                        </p>
                        <a href="{{ route('compare') }}" class="inline-flex items-center px-4 py-2 bg-gradient-custom text-white font-medium text-sm rounded-lg hover-primary transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Reset Search
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>


<x-frontend-footer>

</x-frontend-footer>
