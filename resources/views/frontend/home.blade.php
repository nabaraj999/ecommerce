{{-- resources/views/frontend/home.blade.php --}}
<x-frontend-layout>
    {{-- Custom CSS for color variables --}}
    <style>
        :root {
            --primary-color: #009900;
            --secondary-color: #ffcc33;
            --ancient-color: #202020;
            --paragraph: #333333;
        }

        .bg-primary { background-color: var(--primary-color); }
        .bg-secondary { background-color: var(--secondary-color); }
        .bg-ancient { background-color: var(--ancient-color); }
        .text-primary { color: var(--primary-color); }
        .text-secondary { color: var(--secondary-color); }
        .text-ancient { color: var(--ancient-color); }
        .text-paragraph { color: var(--paragraph); }
        .border-primary { border-color: var(--primary-color); }
        .hover\:bg-primary:hover { background-color: var(--primary-color); }
        .hover\:text-primary:hover { color: var(--primary-color); }

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

        /* Advertisement Specific Styles */
        .advertisement-banner {
            position: relative;
            overflow: hidden;
        }
        .advertisement-banner::before {
            content: 'Ad';
            position: absolute;
            top: 8px;
            right: 8px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            z-index: 10;
        }
        .advertisement-sidebar img,
        .advertisement-footer img {
            transition: all 0.3s ease;
        }
        .advertisement-sidebar:hover img,
        .advertisement-footer:hover img {
            transform: scale(1.05);
            filter: brightness(1.1);
        }
    </style>

    {{-- Featured Advertisement Section (Top Banner) --}}
    <div class="container py-10">
            <div class="space-y-4">
                @foreach ($advertises as $advertise)
                    @if ($advertise->ad_position == 'featured')
                        <div>
                            <a href="{{ $advertise->redirect_url }}" target="_blank">
                                <img class="w-full h-[120px] object-cover"
                                    src="{{ asset(Storage::url($advertise->image)) }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div>

                <div class="text-center py-8">
                    <p class="text-gray-500">No featured advertisements available at the moment.</p>
                </div>
        
        </div>
    </section>

    {{-- Latest Products Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-primary mb-4">Latest Products</h2>
                <p class="text-lg text-paragraph max-w-2xl mx-auto">
                    Discover the newest products from our local vendors. Fresh arrivals and trending items just for you.
                </p>
                <div class="w-24 h-1 bg-primary mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @forelse ($latestProducts as $product)
                    <div class="product-card bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 group">
                        <a href="{{ route('product.show', $product->id) }}" class="block">
                            <div class="relative overflow-hidden">
                                @php
                                    // Get first image from the images array
                                    $firstImage = null;
                                    if (is_array($product->images) && count($product->images) > 0) {
                                        $firstImage = $product->images[0];
                                    } elseif (is_string($product->images)) {
                                        $images = json_decode($product->images, true);
                                        if (is_array($images) && count($images) > 0) {
                                            $firstImage = $images[0];
                                        }
                                    }
                                @endphp

                                <img class="product-image w-full h-48 object-cover transition-transform duration-300"
                                     src="{{ $firstImage ? asset(Storage::url($firstImage)) : asset('images/no-image.png') }}"
                                     alt="{{ $product->name }}">

                                {{-- New Badge --}}
                                <div class="absolute top-3 left-3">
                                    <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-semibold">
                                        NEW
                                    </span>
                                </div>

                                {{-- Discount Badge --}}
                                @if($product->discount > 0)
                                    @php
                                        $discountPercentage = $product->price > 0 ? round(($product->discount / $product->price) * 100) : 0;
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
                                <p class="text-xs text-gray-500 mb-2">{{ $product->brand }}</p>

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

                                {{-- Stock Status --}}
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

                                    {{-- Rating Stars (placeholder) --}}
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
                    <div class="col-span-full text-center py-12">
                        <div class="text-gray-400 mb-4">
                            <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">No Products Available</h3>
                        <p class="text-gray-500">Check back later for new products from our vendors.</p>
                    </div>
                @endforelse
            </div>

            {{-- View All Products Button --}}
            @if($latestProducts->count() > 0)
                <div class="text-center mt-12">
                    <a href="{{ route('products.index') }}"
                       class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-green-700 transform hover:scale-105 transition-all duration-300 inline-flex items-center shadow-lg">
                        <span>View All Products</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- Featured Restaurants Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="mb-12">
                <h2 class="text-4xl font-bold text-primary mb-4">Featured Restaurant/Store</h2>
                <p class="text-lg text-paragraph">The nearest restaurant/store to your location</p>
            </div>

            <div class="mt-5 grid md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach ($vendors as $vendor)
                    <div class="shadow-md hover:shadow-lg shadow-gray-400 rounded-lg overflow-hidden duration-300">
                        <a href="{{ route('shop', $vendor->id) }}" class="block">
                            <img class="w-full h-[200px] object-cover"
                                 src="{{ asset(Storage::url($vendor->profile)) }}"
                                 alt="{{ $vendor->name }}">
                            <div class="p-3">
                                <h3 class="font-semibold">
                                    {{ $vendor->name }}
                                </h3>
                                <p class="text-gray-600">
                                    {{ $vendor->address }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Vendor Registration Section --}}
    <section class="py-20 bg-white">
        <div class="w-[66%] m-auto text-center">
            {{-- Form Advertisement Section (Above Registration Form) --}}
            <div class="advertisement-section mb-8">
                @if($advertises && $advertises->count() > 0)
                    @foreach ($advertises as $advertise)
                        @if ($advertise->ad_position == 'form')
                            <div class="advertisement-banner mb-4">
                                <a href="{{ $advertise->redirect_url }}" target="_blank"
                                   class="block transform hover:scale-105 transition-transform duration-300">
                                    <img class="w-full h-[120px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                                         src="{{ asset(Storage::url($advertise->image)) }}"
                                         alt="{{ $advertise->company_name ?? 'Advertisement' }}">
                                </a>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="text-center py-4">
                        <p class="text-gray-500 text-sm">No form advertisements available.</p>
                    </div>
                @endif
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-ancient mb-8">
                List your Restaurant or Store at
                <span class="text-primary">Floor Digital Pvt. Ltd.</span>!
                <br>
                Reach <span class="text-primary">1,00,000+</span> new customers.
            </h1>

            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="relative">
                        <img src="https://www.gemgovregistration.com/images/vendor-registration-services.jpg"
                             alt="Vendor Registration"
                             class="w-full rounded-2xl shadow-2xl">
                        <div class="absolute -bottom-4 -right-4 bg-secondary text-ancient p-4 rounded-xl shadow-lg">
                            <div class="font-bold text-lg">Join Today!</div>
                            <div class="text-sm">Quick & Easy Setup</div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-gray-50 p-8 rounded-2xl shadow-xl">
                        <h3 class="text-2xl font-bold text-ancient mb-6 text-center">Get Started Today</h3>

                        <form action="{{ route('vendor_request') }}" method="post" class="space-y-6">
                            @csrf

                            <div class="text-left">
                                <label for="name" class="block text-sm font-semibold text-ancient mb-2">
                                    Enter Your Shop Name *
                                </label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none transition-colors duration-300 @error('name') border-red-500 @enderror"
                                       placeholder="Enter your shop name"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="text-left">
                                <label for="email" class="block text-sm font-semibold text-ancient mb-2">
                                    Enter Your Email *
                                </label>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none transition-colors duration-300 @error('email') border-red-500 @enderror"
                                       placeholder="your@email.com"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="text-left">
                                <label for="contact_no" class="block text-sm font-semibold text-ancient mb-2">
                                    Enter Your Contact Number *
                                </label>
                                <input type="tel"
                                       name="contact_no"
                                       id="contact_no"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none transition-colors duration-300 @error('contact_no') border-red-500 @enderror"
                                       placeholder="+977 98xxxxxxxx"
                                       value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="text-left">
                                <label for="address" class="block text-sm font-semibold text-ancient mb-2">
                                    Enter Your Address *
                                </label>
                                <input type="text"
                                       name="address"
                                       id="address"
                                       class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none transition-colors duration-300 @error('address') border-red-500 @enderror"
                                       placeholder="Enter your business address"
                                       value="{{ old('address') }}">
                                @error('address')
                                    <p class="text-red-500 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="pt-4">
                                <button type="submit"
                                        class="w-full bg-primary text-white py-4 px-6 rounded-lg font-bold text-lg hover:bg-green-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Send Request
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sidebar Advertisement Section (Between Sections) --}}
    <section class="py-8 bg-white">
        <div class="container mx-auto px-4">
            @if($advertises && $advertises->count() > 0)
                <div class="flex flex-wrap gap-4 justify-center">
                    @foreach ($advertises as $advertise)
                        @if ($advertise->ad_position == 'sidebar')
                            <div class="advertisement-sidebar flex-1 min-w-[300px] max-w-[400px]">
                                <a href="{{ $advertise->redirect_url }}" target="_blank"
                                   class="block transform hover:scale-105 transition-transform duration-300">
                                    <img class="w-full h-[100px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                                         src="{{ asset(Storage::url($advertise->image)) }}"
                                         alt="{{ $advertise->company_name ?? 'Sidebar Advertisement' }}">
                                </a>
                                <div class="text-center mt-2">
                                    <p class="text-xs text-gray-500">{{ $advertise->company_name }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-ancient mb-4">Why Choose Floor Digital?</h2>
                <p class="text-lg text-paragraph">We help local businesses thrive in the digital world</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-ancient mb-2">Wide Reach</h3>
                    <p class="text-paragraph">Connect with over 100,000 potential customers in your area</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-ancient" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-ancient mb-2">Quick Setup</h3>
                    <p class="text-paragraph">Get your business online in minutes with our easy registration process</p>
                </div>

                <div class="text-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-ancient mb-2">24/7 Support</h3>
                    <p class="text-paragraph">Our dedicated team is here to help you succeed every step of the way</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer Advertisement Section --}}
    <section class="py-8 bg-gray-100">
        <div class="container mx-auto px-4">
            @if($advertises && $advertises->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($advertises as $advertise)
                        @if ($advertise->ad_position == 'footer')
                            <div class="advertisement-footer">
                                <a href="{{ $advertise->redirect_url }}" target="_blank"
                                   class="block transform hover:scale-105 transition-transform duration-300">
                                    <img class="w-full h-[80px] object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                                         src="{{ asset(Storage::url($advertise->image)) }}"
                                         alt="{{ $advertise->company_name ?? 'Footer Advertisement' }}">
                                </a>
                                <div class="text-center mt-2">
                                    <h4 class="text-sm font-semibold text-gray-700">{{ $advertise->company_name }}</h4>
                                    <p class="text-xs text-gray-500">{{ $advertise->contact }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="text-center py-4">
                    <p class="text-gray-500 text-sm">Partner with us to advertise your business!</p>
                </div>
            @endif
        </div>
    </section>

</x-frontend-layout>
