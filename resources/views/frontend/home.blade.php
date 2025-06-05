<x-frontend-layout>
    <!-- Enhanced Featured Stores Section -->
    <section class="py-16 bg-gradient-to-br from-white to-gray-50">
        <div class="container mx-auto">
            <!-- Enhanced Section Header -->
            <div class="text-center mb-12">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-lg" style="background-color: var(--primary-color);">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold" style="color: var(--primary-color);">
                        Featured Tech Stores
                    </h2>
                </div>
                <p class="text-lg" style="color: var(--paragraph);">
                    Discover the best stores near your location
                </p>
                <!-- Decorative line -->
                <div class="w-24 h-1 mx-auto mt-4 rounded-full" style="background-color: var(--secondary-color);"></div>
            </div>

            <!-- Enhanced Store Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($vendors as $vendor)
                    <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 border border-gray-200 hover:border-[var(--secondary-color)]">
                        <a href="{{route('shop',$vendor->id)}}" class="block">
                            <!-- Minimized Image Container -->
                            <div class="relative overflow-hidden">
                                <img
                                    class="w-full h-40 object-cover transition-transform duration-300 group-hover:scale-105"
                                    src="{{asset(Storage::url($vendor->profile))}}"
                                    alt="{{ $vendor->name }}"
                                >
                                <!-- Overlay on hover -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Store badge -->
                                <div class="absolute top-2 left-2 px-2 py-1 rounded-full text-white text-xs font-bold shadow-md" style="background-color: var(--primary-color);">
                                    ⭐ Featured
                                </div>
                            </div>

                            <!-- Minimized Content Section -->
                            <div class="p-4 space-y-2">
                                <!-- Store Name -->
                                <h3 class="text-lg font-bold group-hover:text-[var(--primary-color)] transition-colors duration-300" style="color: var(--ancient-color);">
                                    {{ $vendor->name }}
                                </h3>

                                <!-- Location with icon -->
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" style="color: var(--primary-color);" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="text-sm" style="color: var(--paragraph);">{{ $vendor->address }}</p>
                                </div>

                                <!-- Store Stats -->
                                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                    <div class="flex items-center gap-4 text-sm">
                                        <span class="flex items-center gap-1" style="color: var(--paragraph);">
                                            ⭐ <span class="font-medium">4.8</span>
                                        </span>
                                    </div>
                                    <div class="text-xs px-2 py-1 rounded-full font-medium" style="background-color: rgba(0, 153, 0, 0.1); color: var(--primary-color);">
                                        Open Now
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Enhanced Registration Section -->
    <section class="py-20" style="background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);">
        <div class="w-[90%] md:w-[80%] lg:w-[70%] mx-auto">

            <!-- Enhanced Header -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>

                <h1 class="text-3xl lg:text-4xl font-bold mb-4 leading-tight" style="color: var(--ancient-color);">
                    List your Restaurant or Store at Floor Digital Pvt. Ltd.!
                </h1>
            </div>

            <!-- Enhanced Registration Form -->
            <div class="grid lg:grid-cols-2 gap-8 items-center max-w-4xl mx-auto">

                <!-- Enhanced Image Section -->
                <div class="relative">
                    <div class="absolute -inset-2 rounded-2xl blur-lg opacity-20" style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));"></div>
                    <img
                        class="relative rounded-2xl shadow-xl w-full transform hover:scale-105 transition-transform duration-500"
                        src="https://www.gemgovregistration.com/images/vendor-registration-services.jpg"
                        alt="Registration"
                    >
                    <!-- Overlay badge -->
                    <div class="absolute top-4 left-4 px-3 py-1 rounded-full text-white font-bold shadow-lg" style="background-color: var(--primary-color);">
                        🚀 Get Started Today
                    </div>
                </div>

                <!-- Compact Form Section -->
                <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-200 hover:border-[var(--secondary-color)] transition-all duration-300">
                    <!-- Form Header -->
                    <div class="text-center mb-6">
                        <h3 class="text-xl font-bold mb-1" style="color: var(--ancient-color);">
                            Join Our Platform
                        </h3>
                        <p class="text-sm" style="color: var(--paragraph);">
                            Fill out the form below to get started
                        </p>
                    </div>

                    <form action="{{ route('vendor_request') }}" method="post" class="space-y-4">
                        @csrf

                        <!-- Compact Form Fields -->
                        <div class="space-y-4">
                            <!-- Shop Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-bold mb-1 flex items-center gap-2" style="color: var(--ancient-color);">
                                    🏪 Shop Name
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="w-full border-2 border-gray-200 focus:border-[var(--primary-color)] p-3 rounded-lg transition-all duration-300 focus:outline-none text-sm"
                                    style="color: var(--paragraph);"
                                    placeholder="Enter your shop name"
                                    value="{{ old('name') }}"
                                >
                                @error('name')
                                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-bold mb-1 flex items-center gap-2" style="color: var(--ancient-color);">
                                    📧 Email Address
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    class="w-full border-2 border-gray-200 focus:border-[var(--primary-color)] p-3 rounded-lg transition-all duration-300 focus:outline-none text-sm"
                                    style="color: var(--paragraph);"
                                    placeholder="your.email@example.com"
                                    value="{{ old('email') }}"
                                >
                                @error('email')
                                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Contact Number Field -->
                            <div>
                                <label for="contact_no" class="block text-sm font-bold mb-1 flex items-center gap-2" style="color: var(--ancient-color);">
                                    📱 Contact Number
                                </label>
                                <input
                                    type="tel"
                                    name="contact_no"
                                    id="contact_no"
                                    class="w-full border-2 border-gray-200 focus:border-[var(--primary-color)] p-3 rounded-lg transition-all duration-300 focus:outline-none text-sm"
                                    style="color: var(--paragraph);"
                                    placeholder="+977 98XXXXXXXX"
                                    value="{{ old('contact_no') }}"
                                >
                                @error('contact_no')
                                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address Field -->
                            <div>
                                <label for="address" class="block text-sm font-bold mb-1 flex items-center gap-2" style="color: var(--ancient-color);">
                                    📍 Business Address
                                </label>
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    class="w-full border-2 border-gray-200 focus:border-[var(--primary-color)] p-3 rounded-lg transition-all duration-300 focus:outline-none text-sm"
                                    style="color: var(--paragraph);"
                                    placeholder="Enter your complete address"
                                    value="{{ old('address') }}"
                                >
                                @error('address')
                                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Compact Submit Button -->
                        <div class="pt-2">
                            <button
                                type="submit"
                                class="w-full font-bold py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] text-white flex items-center justify-center gap-2"
                                style="background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));"
                            >
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                Send Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
