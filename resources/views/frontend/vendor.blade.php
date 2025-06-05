<x-frontend-layout>
    <!-- Enhanced Hero Section -->
    <section
        style="background-image: url({{ asset(Storage::url($vendor->profile)) }})"
        class="h-[600px] w-full relative overflow-hidden group"
    >
        <!-- Enhanced Background with Parallax Effect -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-700 group-hover:scale-105"
             style="background-image: url({{ asset(Storage::url($vendor->profile)) }})"></div>

        <!-- Multi-layer Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-purple-900/50 to-black/80"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent"></div>

        <!-- Floating Animation Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-2 h-2 bg-white rounded-full animate-pulse"></div>
            <div class="absolute top-1/3 right-1/4 w-1 h-1 bg-purple-300 rounded-full animate-ping"></div>
            <div class="absolute bottom-1/3 left-1/3 w-1.5 h-1.5 bg-white rounded-full animate-pulse delay-500"></div>
        </div>

        <div class="container relative h-full">
            <!-- Enhanced Vendor Info Card -->
            <div class="bg-gradient-to-r from-black/80 via-black/70 to-purple-900/60 backdrop-blur-xl border border-white/20 flex items-center gap-6 text-white px-8 py-6 absolute bottom-8 w-full left-0 rounded-2xl shadow-2xl transform hover:scale-[1.02] transition-all duration-500">
                <!-- Enhanced Vendor Image -->
                <div class="relative group/img">
                    <!-- Glow Effect -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-purple-400 to-pink-400 rounded-2xl blur-sm opacity-60 group-hover/img:opacity-100 transition-opacity"></div>

                    <!-- Main Image -->
                    <img
                        class="w-[140px] h-[140px] object-cover rounded-2xl border-4 border-white/30 shadow-xl relative z-10 transition-transform duration-300 group-hover/img:scale-105"
                        src="{{ asset(Storage::url($vendor->profile)) }}"
                        alt="{{ $vendor->name }}"
                    >

                    <!-- Enhanced Verification Badge -->
                    <div class="absolute -top-3 -right-3 z-20">
                        <!-- Glow Background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 via-blue-500 to-purple-600 rounded-full blur-sm animate-pulse"></div>

                        <!-- Main Badge -->
                        <div class="relative bg-gradient-to-r from-emerald-400 via-blue-500 to-purple-600 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-2xl border-2 border-white/30 flex items-center gap-1">
                            <!-- Verified Icon -->
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Verified</span>
                        </div>
                    </div>

                    <!-- Status Indicator -->
                    <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 border-3 border-white rounded-full z-20 animate-pulse"></div>
                </div>

                <!-- Enhanced Vendor Details -->
                <div class="flex-1 space-y-3">
                    <!-- Vendor Name with Gradient -->
                    <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-white via-purple-200 to-pink-200 bg-clip-text text-transparent leading-tight">
                        {{ $vendor->name }}
                    </h1>

                    <!-- Address with Icon -->
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-white/10 rounded-full backdrop-blur-sm">
                            <svg class="w-5 h-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <p class="text-lg font-medium text-white">{{ $vendor->address }}</p>
                    </div>

                    <!-- Store Stats -->
                    <div class="flex items-center gap-4 text-sm">
                        <div class="flex items-center gap-2 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-sm">
                            <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"></path>
                            </svg>
                            <span class="text-white font-semibold">{{ count($products) }} Products</span>
                        </div>

                        <div class="flex items-center gap-2 bg-white/10 px-3 py-1.5 rounded-full backdrop-blur-sm">
                            <svg class="w-4 h-4 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-white font-semibold">Premium Store</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 text-white/60 animate-bounce">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- Enhanced Products Section -->
    <section class="bg-gradient-to-br from-gray-50 via-white to-gray-100 py-16">
        <div class="container">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent mb-4">
                    Our Products
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
            </div>

            <!-- Enhanced Product Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                @foreach ($products as $product)
                    <!-- Product Card Wrapper with Enhanced Effects -->
                    <div class="group relative transform transition-all duration-500 hover:-translate-y-2">
                        <!-- Subtle Glow Effect -->
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-200 to-pink-200 rounded-xl blur opacity-0 group-hover:opacity-70 transition-opacity duration-500"></div>

                        <!-- Card Container -->
                        <div class="relative bg-white rounded-xl shadow-md group-hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-100 cursor-pointer">
                            <x-product-card :product="$product" />

                            <!-- Subtle Overlay on Hover -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/10 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
