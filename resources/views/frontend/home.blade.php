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
    </style>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-br from-green-600 to-green-500 text-white">
        <div class="container mx-auto px-4 py-20 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 drop-shadow-lg">
                Discover Local Flavors
            </h1>
            <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-2xl mx-auto">
                Find the best restaurants and stores in your neighborhood. Connect with local businesses and explore amazing food experiences.
            </p>
            <a href="#featured" class="bg-secondary text-ancient px-8 py-4 rounded-full font-bold text-lg hover:bg-yellow-400 transform hover:scale-105 transition-all duration-300 inline-block shadow-lg">
                Explore Now
            </a>
        </div>
    </section>

    {{-- Advertisement Section --}}
    <section class="py-12 bg-gradient-to-r from-gray-50 to-white">
        <div class="container mx-auto px-4">
            {{-- Main Banner Advertisement --}}
            <div class="mb-8">
                @foreach ($advertises as $advertise)
                    @if ($advertise->ad_position == 'hero_banner')
                        <div class="relative group">
                            <a href="{{ $advertise->redirect_url }}" target="_blank" class="block">
                                <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                                    <img class="w-full h-64 md:h-80 object-cover group-hover:scale-105 transition-transform duration-500"
                                        src="{{ asset(Storage::url($advertise->image)) }}"
                                        alt="{{ $advertise->title ?? 'Premium Advertisement' }}">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-secondary text-ancient px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                            🎯 Sponsored
                                        </span>
                                    </div>
                                    @if($advertise->title)
                                        <div class="absolute bottom-6 left-6 right-6">
                                            <h3 class="text-white text-2xl font-bold mb-2">{{ $advertise->title }}</h3>
                                            @if($advertise->description)
                                                <p class="text-white/90 text-sm">{{ Str::limit($advertise->description, 100) }}</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>

            {{-- Featured Advertisements Grid --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-bold text-ancient">Featured Promotions</h3>
                    <span class="text-sm text-paragraph bg-gray-100 px-3 py-1 rounded-full">Limited Time Offers</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($advertises as $advertise)
                        @if ($advertise->ad_position == 'featured')
                            <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100">
                                <a href="{{ $advertise->redirect_url }}" target="_blank" class="block">
                                    <div class="relative">
                                        <img class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-500 filter group-hover:brightness-110"
                                            src="{{ asset(Storage::url($advertise->image)) }}"
                                            alt="{{ $advertise->title ?? 'Featured Advertisement' }}">

                                        {{-- Advertisement Type Badge --}}
                                        <div class="absolute top-3 left-3">
                                            @if($advertise->ad_type == 'food')
                                                <span class="bg-red-500 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center">
                                                    🍽️ Food & Dining
                                                </span>
                                            @elseif($advertise->ad_type == 'shopping')
                                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center">
                                                    🛍️ Shopping
                                                </span>
                                            @elseif($advertise->ad_type == 'service')
                                                <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center">
                                                    ⚡ Services
                                                </span>
                                            @else
                                                <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-semibold flex items-center">
                                                    ⭐ Featured
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Discount Badge --}}
                                        @if($advertise->discount_percentage)
                                            <div class="absolute top-3 right-3">
                                                <span class="bg-secondary text-ancient px-3 py-1 rounded-full text-sm font-bold shadow-lg animate-pulse">
                                                    {{ $advertise->discount_percentage }}% OFF
                                                </span>
                                            </div>
                                        @endif

                                        {{-- Overlay for better text readability --}}
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    </div>

                                    <div class="p-5">
                                        @if($advertise->title)
                                            <h4 class="font-bold text-lg text-ancient mb-2 group-hover:text-primary transition-colors duration-300">
                                                {{ $advertise->title }}
                                            </h4>
                                        @endif

                                        @if($advertise->description)
                                            <p class="text-paragraph text-sm mb-3 line-clamp-2">
                                                {{ Str::limit($advertise->description, 80) }}
                                            </p>
                                        @endif

                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center text-sm text-gray-500">
                                                @if($advertise->location)
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    {{ $advertise->location }}
                                                @endif
                                            </div>

                                            <div class="flex items-center text-primary font-semibold text-sm group-hover:translate-x-1 transition-transform duration-300">
                                                View Offer
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                </svg>
                                            </div>
                                        </div>

                                        {{-- Validity Information --}}
                                        @if($advertise->valid_until)
                                            <div class="mt-3 pt-3 border-t border-gray-100">
                                                <p class="text-xs text-red-600 font-medium flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                    Valid until {{ \Carbon\Carbon::parse($advertise->valid_until)->format('M d, Y') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- Sidebar Advertisements --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($advertises as $advertise)
                    @if ($advertise->ad_position == 'sidebar')
                        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border-l-4 border-primary">
                            <a href="{{ $advertise->redirect_url }}" target="_blank" class="flex items-center p-4 group">
                                <div class="flex-shrink-0 mr-4">
                                    <img class="w-16 h-16 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300"
                                         src="{{ asset(Storage::url($advertise->image)) }}"
                                         alt="{{ $advertise->title ?? 'Sidebar Advertisement' }}">
                                </div>
                                <div class="flex-1">
                                    @if($advertise->title)
                                        <h5 class="font-semibold text-ancient group-hover:text-primary transition-colors duration-300">
                                            {{ $advertise->title }}
                                        </h5>
                                    @endif
                                    @if($advertise->description)
                                        <p class="text-sm text-paragraph mt-1">
                                            {{ Str::limit($advertise->description, 60) }}
                                        </p>
                                    @endif
                                    <span class="text-xs text-primary font-medium mt-2 inline-block">Learn More →</span>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- Featured Restaurants Section --}}
    <section id="featured" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-primary mb-4">Featured Restaurants & Stores</h2>
                <p class="text-lg text-paragraph max-w-2xl mx-auto">
                    Discover the nearest and most popular restaurants and stores in your location.
                    Quality food and services just around the corner.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($vendors as $vendor)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 group">
                        <a href="{{ route('shop', $vendor->id) }}" class="block">
                            <div class="relative overflow-hidden">
                                <img class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500"
                                     src="{{ asset(Storage::url($vendor->profile)) }}"
                                     alt="{{ $vendor->name }}">
                                <div class="absolute inset-0 bg-black bg-opacity-20 group-hover:bg-opacity-10 transition-all duration-300"></div>
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold">
                                        Featured
                                    </span>
                                </div>
                            </div>

                            <div class="p-6">
                                <h3 class="text-xl font-bold text-ancient mb-2 group-hover:text-primary transition-colors duration-300">
                                    {{ $vendor->name }}
                                </h3>
                                <p class="text-paragraph flex items-center">
                                    <svg class="w-4 h-4 text-primary mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $vendor->address }}
                                </p>
                                <div class="mt-4 flex items-center justify-between">
                                    <span class="text-sm text-gray-500">View Details</span>
                                    <svg class="w-5 h-5 text-primary group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Vendor Registration Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            {{-- Form Advertisement --}}
            <div class="text-center mb-12">
                @foreach ($advertises as $advertise)
                    @if ($advertise->ad_position == 'form')
                        <div class="mb-8">
                            <a href="{{ $advertise->redirect_url }}" target="_blank" class="inline-block">
                                <img class="max-w-full h-32 object-cover rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300"
                                    src="{{ asset(Storage::url($advertise->image)) }}"
                                    alt="Advertisement">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-ancient mb-6">
                        List Your Restaurant or Store with
                        <span class="text-primary">Floor Digital Pvt. Ltd.</span>
                    </h2>
                    <p class="text-xl text-paragraph mb-4">
                        Reach <span class="font-bold text-primary">1,00,000+</span> new customers and grow your business
                    </p>
                    <div class="w-24 h-1 bg-primary mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    {{-- Image Section --}}
                    <div class="order-2 lg:order-1">
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

                    {{-- Form Section --}}
                    <div class="order-1 lg:order-2">
                        <div class="bg-gray-50 p-8 rounded-2xl shadow-xl">
                            <h3 class="text-2xl font-bold text-ancient mb-6 text-center">Get Started Today</h3>

                            <form action="{{ route('vendor_request') }}" method="post" class="space-y-6">
                                @csrf

                                <div>
                                    <label for="name" class="block text-sm font-semibold text-ancient mb-2">
                                        Shop Name *
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

                                <div>
                                    <label for="email" class="block text-sm font-semibold text-ancient mb-2">
                                        Email Address *
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

                                <div>
                                    <label for="contact_no" class="block text-sm font-semibold text-ancient mb-2">
                                        Contact Number *
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

                                <div>
                                    <label for="address" class="block text-sm font-semibold text-ancient mb-2">
                                        Business Address *
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

    {{-- Call to Action Footer --}}
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Grow Your Business?</h2>
            <p class="text-xl mb-8 opacity-90">Join thousands of successful restaurants and stores on our platform</p>
            <a href="#vendor-form" class="bg-secondary text-ancient px-8 py-4 rounded-full font-bold text-lg hover:bg-yellow-400 transform hover:scale-105 transition-all duration-300 inline-block shadow-lg">
                Get Started Today
            </a>
        </div>
    </section>
</x-frontend-layout>
