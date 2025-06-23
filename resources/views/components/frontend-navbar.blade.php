<header class="bg-[var(--primary-color)] shadow-lg sticky top-0 z-50 transition-all duration-300">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between gap-8">
            <!-- Logo Section -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="block transition-transform hover:scale-105">
                    <img class="h-10 w-auto object-contain"
                         src="{{ asset(Storage::url($company->logo)) }}"
                         alt="Company Logo">
                </a>
            </div>

            <!-- Search Section -->
            <div class="flex-1 max-w-2xl mx-8">
                <form action="{{ route('compare') }}" method="get" class="relative">
                    <div class="flex rounded-lg overflow-hidden shadow-md bg-white">
                        <input
                            class="flex-1 px-4 py-3 text-gray-700 placeholder-gray-400 border-none outline-none focus:ring-0 text-sm"
                            type="text"
                            name="search"
                            placeholder="Search and compare products by name..."
                            autocomplete="off">

                        <button
                            type="submit"
                            class="px-6 py-3 bg-[var(--secondary-color)] text-[var(--ancient-color)] font-medium text-sm hover:bg-yellow-400 transition-colors duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Compare
                        </button>
                    </div>
                </form>
            </div>

            <!-- Product Button Section -->
            <div class="flex-shrink-0">
                <a href="{{ route('products.index') }}"
                   class="px-6 py-3 bg-white text-[var(--primary-color)] font-semibold text-sm rounded-lg shadow-md hover:shadow-lg hover:bg-gray-50 transition-all duration-200 flex items-center gap-2 border border-white/20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Shop
                </a>
            </div>

            <!-- User Actions Section -->
            <div class="flex items-center gap-4">
                @if (!Auth::user())
                    <!-- Guest User -->
                    <div class="flex items-center gap-3">
                        <a href="{{ route('register') }}"
                           class="px-4 py-2 text-white text-sm font-medium hover:text-[var(--secondary-color)] transition-colors duration-200">
                            Sign Up
                        </a>

                        <!-- Login Dropdown -->
                        <div class="relative group">
                            <button class="px-4 py-2 bg-white text-[var(--primary-color)] text-sm font-medium rounded-md hover:bg-gray-100 transition-colors duration-200 shadow-sm flex items-center gap-2">
                                Login
                                <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="py-1">
                                    <a href="{{ route('login') }}"
                                       class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-[var(--primary-color)] transition-colors duration-200 flex items-center gap-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        User Login
                                    </a>

                                    <a href="/shop/login"
                                       class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-[var(--primary-color)] transition-colors duration-200 flex items-center gap-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                        </svg>
                                        Vendor Login
                                    </a>

                                    <a href="/admin/login"
                                       class="block px-4 py-3 text-sm text-gray-700 hover:bg-gray-100 hover:text-[var(--primary-color)] transition-colors duration-200 flex items-center gap-3">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        Admin Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Authenticated User -->
                    <div class="flex items-center gap-4">
                        <!-- Cart Icon -->
                        <a href="{{ route('carts') }}"
                           class="relative p-2 text-white hover:text-[var(--secondary-color)] transition-colors duration-200 group">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5.4M7 13v8a2 2 0 002 2h10a2 2 0 002-2v-8m-9 4h6"></path>
                            </svg>
                            @if(isset($carts) && count($carts) > 0)
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold animate-pulse">
                                    {{ count($carts) > 9 ? '9+' : count($carts) }}
                                </span>
                            @endif
                            <span class="sr-only">Shopping Cart</span>
                        </a>

                        <!-- Orders Link -->
                        <a href="{{ route('orders.index') }}"
                           class="p-2 text-white hover:text-[var(--secondary-color)] transition-colors duration-200 flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01m-.01 4h.01"></path>
                            </svg>
                            <span class="text-sm font-medium">Orders</span>
                        </a>

                        <!-- Logout Button -->
                        <form action="{{ route('logout') }}" method="post" class="inline">
                            @csrf
                            <button type="submit"
                                    class="px-4 py-2 text-white text-sm font-medium hover:text-[var(--secondary-color)] transition-colors duration-200 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</header>
