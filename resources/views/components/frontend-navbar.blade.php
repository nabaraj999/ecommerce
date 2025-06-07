<header class="bg-[var(--primary-color)] text-white py-4 shadow-2xl sticky top-0 z-50">
    <nav class="container mx-auto flex flex-wrap items-center justify-between px-4 lg:px-6">

        <!-- Enhanced Logo Section -->
        <div class="flex items-center space-x-3 group">
            <a href="/" class="flex items-center space-x-2 transition-transform duration-300 hover:scale-105">
                <div class="relative">
                    <!-- Glow effect behind logo -->
                    <div class="absolute -inset-1 bg-white/20 rounded-xl blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <img
                        src="{{ asset(Storage::url($company->logo)) }}"
                        alt="Logo"
                        class="h-12 lg:h-14 object-contain relative z-10 drop-shadow-lg"
                    >
                </div>
            </a>
        </div>

        <!-- Enhanced Search Bar -->
        <div class="w-full md:w-1/2 lg:w-2/5 mt-4 md:mt-0 order-3 md:order-2">
            <form action="{{route('compare')}}" method="get" class="relative group">
                <div class="flex rounded-xl overflow-hidden shadow-lg bg-white border-2 border-transparent group-focus-within:border-[var(--secondary-color)] transition-all duration-300 group-hover:shadow-2xl group-focus-within:shadow-2xl">
                    <!-- Search Icon -->
                    <div class="flex items-center px-4 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <input
                        type="text"
                        name="q"
                        id="company"
                        style="color: var(--paragraph);"
                        class="flex-1 px-2 py-3 focus:outline-none bg-transparent placeholder-gray-500 font-medium"
                        placeholder="Compare products by name..."
                    >

                    <button
                        type="submit"
                        style="background-color: var(--secondary-color); color: var(--ancient-color);"
                        class="hover:opacity-90 px-6 py-3 font-bold transition-all duration-300 hover:shadow-lg transform hover:scale-105 flex items-center gap-2"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="hidden sm:inline">Compare</span>
                    </button>
                </div>

                <!-- Search suggestions overlay -->
                <div class="absolute top-full left-0 right-0 bg-white rounded-b-xl shadow-xl border-2 border-[var(--secondary-color)] mt-1 opacity-0 invisible group-focus-within:opacity-100 group-focus-within:visible transition-all duration-300 z-50">
                    <div class="p-4 text-sm" style="color: var(--paragraph);">
                        <p class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Type to search and compare products
                        </p>
                    </div>
                </div>
            </form>
        </div>

        <!-- Enhanced Auth Buttons -->
        <div class="relative flex items-center space-x-3 mt-4 md:mt-0 order-2 md:order-3">

            <!-- Enhanced Sign Up Button -->
            <button class="group relative bg-white/10 hover:bg-white/20 text-white font-bold px-6 py-2.5 rounded-xl border-2 border-white/30 hover:border-[var(--secondary-color)] transition-all duration-300 hover:shadow-lg transform hover:scale-105 flex items-center gap-2">
                <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span class="hidden sm:inline">Sign Up</span>
            </button>

            <!-- Enhanced Login Dropdown -->
            <div class="relative group">
                <button style="background-color: var(--secondary-color); color: var(--ancient-color);" class="group/btn relative font-bold px-6 py-2.5 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 focus:outline-none flex items-center gap-2 border-2 border-transparent hover:opacity-90">
                    <svg class="w-4 h-4 transition-transform group-hover/btn:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="hidden sm:inline">Login</span>
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Enhanced Dropdown Menu -->
                <div class="absolute right-0 mt-3 w-56 bg-white shadow-2xl rounded-2xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50 border-2 border-[var(--secondary-color)] overflow-hidden">
                    <!-- Dropdown Header -->
                    <div class="px-4 py-3 border-b-2 border-[var(--secondary-color)]" style="background-color: #f9f9f9;">
                        <p class="text-sm font-bold flex items-center gap-2" style="color: var(--ancient-color);">
                            <svg class="w-4 h-4" style="color: var(--primary-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Choose Login Type
                        </p>
                    </div>

                    <ul class="py-2">
                        <li>
                            <a href="" class="group/item flex items-center gap-3 px-4 py-3 hover:bg-[#f9f9f9] transition-all duration-200" style="color: var(--paragraph);">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center group-hover/item:shadow-md transition-all" style="background-color: var(--primary-color);">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold" style="color: var(--ancient-color);">User Login</p>
                                    <p class="text-xs" style="color: var(--paragraph);">Customer account</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/admin/login" class="group/item flex items-center gap-3 px-4 py-3 hover:bg-[#f9f9f9] transition-all duration-200" style="color: var(--paragraph);">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center group-hover/item:shadow-md transition-all" style="background-color: var(--secondary-color);">
                                    <svg class="w-4 h-4" style="color: var(--ancient-color);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold" style="color: var(--ancient-color);">Admin Login</p>
                                    <p class="text-xs" style="color: var(--paragraph);">Administrator access</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/shop/login" class="group/item flex items-center gap-3 px-4 py-3 hover:bg-[#f9f9f9] transition-all duration-200 rounded-b-2xl" style="color: var(--paragraph);">
                                <div class="w-8 h-8 rounded-lg flex items-center justify-center group-hover/item:shadow-md transition-all" style="background-color: var(--ancient-color);">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-bold" style="color: var(--ancient-color);">Vendor Login</p>
                                    <p class="text-xs" style="color: var(--paragraph);">Shop owner access</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Optional: Mobile Menu Toggle -->
    <div class="md:hidden mt-4 px-4">
        <button class="w-full bg-white/10 text-white font-bold py-2 px-4 rounded-lg border-2 border-white/30 hover:border-[var(--secondary-color)] flex items-center justify-center gap-2 hover:bg-white/20 transition-all duration-300">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            Menu
        </button>
    </div>
</header>
