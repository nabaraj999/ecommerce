@props(['product'])

<a href="{{route('product.show', $product->id)}}" class="group block bg-white rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100">

    <!-- Product Image Container -->
    <div class="relative overflow-hidden bg-gray-50">
        <img
            class="w-full h-48 sm:h-40 lg:h-48 object-cover group-hover:scale-110 transition-transform duration-500"
            src="{{ isset($product->images[0]) ? asset(Storage::url($product->images[0])) : asset('images/no-image.png') }}"
            alt="{{ $product->name }}"
        >

        <!-- Discount Badge -->
        @if ($product->discount > 0 && $product->price > 0)
            @php
                $discountPercentage = round(($product->discount / $product->price) * 100);
            @endphp
            <div class="absolute top-3 left-3 bg-gradient-to-r from-red-500 to-pink-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg animate-pulse">
               {{ $discountPercentage }}% OFF
            </div>
        @endif

        <!-- New Badge (Optional - you can add a 'is_new' field to your product model) -->
        <!-- Uncomment if you want to show new products -->
        <!--
        <div class="absolute top-3 right-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold px-2 py-1 rounded-full shadow-lg">
            NEW
        </div>
        -->

        <!-- Hover Overlay -->
        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </div>

    <!-- Product Details -->
    <div class="p-4 space-y-3">
        <!-- Product Name -->
        <h2 class="text-sm lg:text-base font-semibold text-gray-800 line-clamp-2 group-hover:text-purple-600 transition-colors duration-300 leading-tight">
            {{ $product->name }}
        </h2>

        <!-- Price Section -->
        <div class="flex items-center justify-between">
            <div class="space-y-1">
                @if ($product->discount > 0)
                    <!-- Discounted Price Layout -->
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-lg font-bold text-purple-600">
                            NRs.{{ number_format($product->price - $product->discount) }}
                        </span>
                        <span class="text-sm line-through text-red-500 font-medium">
                            NRs.{{ number_format($product->price) }}
                        </span>
                    </div>
                    <!-- Savings Amount -->
                    <p class="text-xs text-green-600 font-medium">
                        Save NRs.{{ number_format($product->discount) }}
                    </p>
                @else
                    <!-- Regular Price -->
                    <div class="text-lg font-bold text-gray-800">
                        NRs.{{ number_format($product->price) }}
                    </div>
                @endif
            </div>

            <!-- Add to Cart Icon -->
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-2 rounded-full opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300 shadow-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.293 2.293A1 1 0 105 17h12M17 21a2 2 0 100-4 2 2 0 000 4zM9 21a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
            </div>
        </div>

        <!-- Rating Stars (Optional - you can add rating field to your product model) -->
        <!-- Uncomment if you want to show ratings -->
        <!--
        <div class="flex items-center gap-1">
            <div class="flex text-yellow-400 text-sm">
                ★★★★★
            </div>
            <span class="text-xs text-gray-500 ml-1">(4.5)</span>
        </div>
        -->
    </div>

    <!-- Bottom Gradient Line -->
    <div class="h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-purple-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></div>
</a>
