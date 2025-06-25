{{-- Footer Section --}}
<footer class="bg-[var(--primary-color)] text-white">
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 py-6 sm:py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">

            <!-- Company Info Section -->
            <div class="lg:col-span-1">
                <div class="mb-4">
                    <a href="{{ route('home') }}" class="block mb-3">
                        <img class="h-12 w-auto object-contain"
                             src="{{ asset(Storage::url($company->logo)) }}"
                             alt="Company Logo">
                    </a>
                    <h3 class="text-lg font-bold text-[var(--secondary-color)] mb-2">
                        {{ $company->name }}
                    </h3>
                    <p class="text-white text-sm leading-relaxed mb-3">
                        Your trusted local marketplace connecting customers with quality vendors.
                        Discover amazing products and services in your area.
                    </p>
                </div>

                <!-- Social Media Links -->
                <div class="mb-4">
                    <h4 class="text-sm font-semibold text-[var(--secondary-color)] mb-2 uppercase tracking-wide">
                        Follow Us
                    </h4>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300 group">
                            <svg class="w-5 h-5 text-white group-hover:text-[var(--secondary-color)]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300 group">
                            <svg class="w-5 h-5 text-white group-hover:text-[var(--secondary-color)]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300 group">
                            <svg class="w-5 h-5 text-white group-hover:text-[var(--secondary-color)]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.097.118.112.222.085.343-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.402.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.92-7.252 4.158 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.357-.629-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24.009c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001.012.001z"/>
                            </svg>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition-colors duration-300 group">
                            <svg class="w-5 h-5 text-white group-hover:text-[var(--secondary-color)]" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div>
                <h4 class="text-lg font-semibold text-[var(--secondary-color)] mb-3">
                    Quick Links
                </h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('home') }}"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            All Products
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('compare') }}"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Compare Products
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Vendors
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Customer Support Section -->
            <div>
                <h4 class="text-lg font-semibold text-[var(--secondary-color)] mb-3">
                    Customer Support
                </h4>
                <ul class="space-y-2">
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Help Center
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Contact Us
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            FAQ
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Shipping Info
                        </a>
                    </li>
                    <li>
                        <a href="#"
                           class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-sm sm:text-base flex items-center group">
                            <svg class="w-4 h-4 mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                            Return Policy
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Information Section -->
            <div>
                <h4 class="text-lg font-semibold text-[var(--secondary-color)] mb-3">
                    Contact Information
                </h4>

                <!-- Contact Info -->
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[var(--secondary-color)] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <div>
                            <p class="text-white text-sm">
                                {{ $company->address }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[var(--secondary-color)] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <div>
                            <p class="text-white text-sm">
                                {{ $company->contact }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[var(--secondary-color)] mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <div>
                            <p class="text-white text-sm">
                                {{ $company->email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-white/20">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                <!-- Copyright -->
                <div class="text-center sm:text-left">
                    <p class="text-white text-xs sm:text-sm">
                        © {{ date('Y') }} {{ $company->name }}. All rights reserved.
                    </p>
                </div>

                <!-- Legal Links -->
                <div class="flex items-center gap-4 sm:gap-6">
                    <a href="#" class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-xs sm:text-sm">
                        Privacy Policy
                    </a>
                    <a href="#" class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-xs sm:text-sm">
                        Terms of Service
                    </a>
                    <a href="#" class="text-white hover:text-[var(--secondary-color)] transition-colors duration-200 text-xs sm:text-sm">
                        Cookie Policy
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button id="backToTop"
            class="fixed bottom-6 right-6 w-12 h-12 bg-[var(--secondary-color)] text-[var(--ancient-color)] rounded-full shadow-lg hover:bg-yellow-400 transition-all duration-300 opacity-0 invisible hover:scale-110 z-40">
        <svg class="w-6 h-6 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <!-- Footer JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Back to top button functionality
            const backToTopButton = document.getElementById('backToTop');

            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });

            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</footer>
