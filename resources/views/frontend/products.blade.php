{{-- resources/views/frontend/products.blade.php --}}
<x-frontend-layout>
    <style>
        :root {
            --primary-color: #009900;
            --secondary-color: #ffcc33;
            --ancient-color: #202020;
            --paragraph: #333333;
        }

        .bg-primary { background-color: var(--primary-color); }
        .bg-secondary { background-color: var(--secondary-color); }
        .text-primary { color: var(--primary-color); }
        .text-ancient { color: var(--ancient-color); }
        .text-paragraph { color: var(--paragraph); }

        .product-image {
            transition: transform 0.3s ease;
        }
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        .price-tag {
            background: linear-gradient(45deg, var(--primary-color), #00cc00);
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    {{-- Page Header --}}
    <section class="bg-gradient-to-br from-green-600 to-green-500 text-white py-16">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">All Products</h1>
            <p class="text-xl opacity-90">Browse our complete collection of products from local vendors</p>
        </div>
    </section>

    {{-- Products Listing Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            {{-- Products Count --}}
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-ancient">
                    All Products ({{ $products->total() }} items)
                </h2>

                {{-- You can add filters here later --}}
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-paragraph">Showing {{ $products->firstItem() }} - {{ $products->lastItem() }} of {{ $products->total() }} results</span>
                </div>
            </div>

            {{-- Products Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @forelse ($products as $product)
                    <div class="product-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 group">
                        <a href="{{ route('product.show', $product->id) }}" class="block">
                            {{-- Product Image Section --}}
                            <div class="relative overflow-hidden">
                                <img class="product-image w-full h-48 object-cover transition-transform duration-300"
                                     src="{{ isset($product->images[0]) ? asset(Storage::url($product->images[0])) : asset('images/no-image.png') }}"
                                     alt="{{ $product->name }}">

                                {{-- Discount Badge --}}
                                @if($product->discount > 0 && $product->price > 0)
                                    @php
                                        $discountPercentage = round(($product->discount / $product->price) * 100);
                                    @endphp
                                    <div class="absolute top-3 right-3">
                                        <span class="bg-secondary text-ancient px-2 py-1 rounded-full text-xs font-bold">
                                            {{ $discountPercentage }}% OFF
                                        </span>
                                    </div>
                                @endif

                                {{-- Quick View Overlay --}}
                                <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button class="bg-white text-primary px-4 py-2 rounded-lg font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        Quick View
                                    </button>
                                </div>
                            </div>

                            {{-- Product Information --}}
                            <div class="p-4">
                                {{-- Vendor Name --}}
                                @if($product->vendor)
                                    <p class="text-xs text-gray-500 mb-1">{{ $product->vendor->name }}</p>
                                @endif

                                {{-- Product Name --}}
                                <h3 class="font-semibold text-ancient mb-2 line-clamp-2 group-hover:text-primary transition-colors duration-300">
                                    {{ $product->name }}
                                </h3>

                                {{-- Brand --}}
                                @if($product->brand)
                                    <p class="text-xs text-gray-500 mb-2">{{ $product->brand }}</p>
                                @endif

                                {{-- Price Section --}}
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        @if($product->discount > 0)
                                            <div class="flex items-center space-x-2">
                                                <span class="price-tag text-white px-2 py-1 rounded text-sm font-bold">
                                                    Rs. {{ number_format($product->price - $product->discount) }}
                                                </span>
                                                <span class="text-gray-500 text-xs line-through">
                                                    Rs. {{ number_format($product->price) }}
                                                </span>
                                            </div>
                                        @else
                                            <span class="price-tag text-white px-2 py-1 rounded text-sm font-bold">
                                                Rs. {{ number_format($product->price) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                {{-- Stock Status and Rating --}}
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @if($product->qty > 0)
                                            <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                            <span class="text-xs text-green-600 font-medium">
                                                {{ $product->qty }} in stock
                                            </span>
                                        @else
                                            <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                            <span class="text-xs text-red-600 font-medium">Out of Stock</span>
                                        @endif
                                    </div>

                                    {{-- Rating Stars --}}
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="text-gray-400 mb-4">
                            <svg class="w-20 h-20 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-600 mb-2">No Products Found</h3>
                        <p class="text-gray-500 mb-8">We couldn't find any products matching your criteria.</p>
                        <a href="{{ route('home') }}" class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors duration-300">
                            Back to Home
                        </a>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($products->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="bg-white rounded-lg shadow-lg p-4">
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Back to Home CTA --}}
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Discover More</h2>
            <p class="text-xl mb-8 opacity-90">Explore our vendors and find amazing local businesses</p>
            <a href="{{ route('home') }}" class="bg-secondary text-ancient px-8 py-4 rounded-full font-bold text-lg hover:bg-yellow-400 transform hover:scale-105 transition-all duration-300 inline-block shadow-lg">
                Browse Vendors
            </a>
        </div>
    </section>
</x-frontend-layout>
