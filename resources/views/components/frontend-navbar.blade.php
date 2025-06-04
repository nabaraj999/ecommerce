<header class="bg-[var(--primary-color)] text-white py-4 shadow-md sticky top-0 z-50">
    <nav class="container mx-auto flex flex-wrap items-center justify-between px-4">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <a href="/">
                <img src="{{ asset(Storage::url($company->logo)) }}" alt="Logo" class="h-10 object-contain">
            </a>
        </div>

        <!-- Search bar -->
        <div class="w-full md:w-1/2 mt-4 md:mt-0">
            <form action="" method="get">
                <div class="flex rounded-lg overflow-hidden shadow-sm bg-white">
                    <input
                        type="text"
                        name="company"
                        id="company"
                        class="w-full px-4 py-2 text-gray-700 focus:outline-none"
                        placeholder="Compare products by name">
                    <button type="submit" class="bg-gray-100 px-4 py-2 text-[var(--primary-color)] font-semibold hover:bg-gray-200">
                        Compare
                    </button>
                </div>
            </form>
        </div>

        <!-- Right side: Sign Up and Login Dropdown -->
        <div class="relative flex items-center space-x-4 mt-4 md:mt-0">
            <!-- Sign Up Button -->
            <button class="bg-white text-[var(--primary-color)] font-semibold px-4 py-2 rounded hover:bg-gray-200 transition">
                Sign Up
            </button>

            <!-- Login Button with Dropdown -->
            <div class="relative group">
                <button class="bg-white text-[var(--primary-color)] font-semibold px-4 py-2 rounded hover:bg-gray-200 transition focus:outline-none">
                    Login
                </button>

                <!-- Dropdown -->
                <div class="absolute right-0 mt-2 w-44 bg-white text-gray-800 shadow-lg rounded-md opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-200 z-50">
                    <ul class="text-sm divide-y divide-gray-200">
                         <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">User Login</a>
                        </li>
                        <li>
                            <a href="/admin/login" class="block px-4 py-2 hover:bg-gray-100">Admin Login</a>
                        </li>
                        <li>
                            <a href="/shop/login" class="block px-4 py-2 hover:bg-gray-100">Vendor Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
