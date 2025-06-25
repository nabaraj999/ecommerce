<x-frontend-layout>
    {{-- Custom CSS for color variables --}}
    <style>
        :root {
            --primary-color: #009900;
            --secondary-color: #ffcc33;
            --ancient-color: #202020;
            --paragraph: #333333;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--paragraph);
            background-color: #f9f9f9;
        }

        p {
            color: var(--paragraph);
            font-size: 14px;
        }

        .container {
            width: 86%;
            margin: auto;
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
        .hover\:bg-green-700:hover { background-color: #006600; }
        .focus\:border-primary:focus { border-color: var(--primary-color); }
        .focus\:ring-primary:focus { --tw-ring-color: var(--primary-color); }

        /* Loading animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .animate-spin {
            animation: spin 1s linear infinite;
        }
    </style>

    {{-- Checkout Header --}}
    <section class="bg-gradient-to-r from-green-50 to-green-100 py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-ancient mb-4 flex items-center justify-center">
                    <svg class="w-10 h-10 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Secure Checkout
                </h1>
                <p class="text-lg text-paragraph">Complete your order from <span class="font-semibold text-primary">{{ $vendor->name }}</span></p>
                <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>
        </div>
    </section>

    {{-- Progress Bar --}}
    <section class="bg-white py-6 border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-center space-x-8">
                <div class="flex items-center text-gray-400">
                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-sm font-bold">
                        ✓
                    </div>
                    <span class="ml-2 text-sm font-medium text-primary">Cart</span>
                </div>
                <div class="w-16 h-0.5 bg-primary"></div>
                <div class="flex items-center text-primary">
                    <div class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-sm font-bold">
                        2
                    </div>
                    <span class="ml-2 text-sm font-medium">Checkout</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center text-gray-400">
                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center text-sm font-bold">
                        3
                    </div>
                    <span class="ml-2 text-sm font-medium">Confirmation</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Checkout Section --}}
    <section class="py-12 min-h-screen">
        <div class="container mx-auto px-4">
            <form action="{{ route('order_store', $vendor->id) }}" method="post" class="max-w-2xl mx-auto">
                @csrf

                <div class="space-y-6">
                    {{-- Delivery Information --}}
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-ancient">Delivery Information</h2>
                        </div>

                        <div class="space-y-6">
                            {{-- Address Selection --}}
                            <div>
                                <label for="address" class="block text-sm font-bold text-ancient mb-3">
                                    Select Delivery Address *
                                </label>
                                <select name="address" id="address"
                                        class="w-full px-4 py-4 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-paragraph bg-white">
                                    <option value="">Choose your delivery address</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}">
                                            {{ $address->address }} (Delivery: Rs. {{ number_format($address->price, 2) }})
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-sm text-gray-500 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Delivery charges included in the price
                                </p>
                            </div>

                            {{-- Address Notes --}}
                            <div>
                                <label for="address_note" class="block text-sm font-bold text-ancient mb-3">
                                    Address Notes (Optional)
                                </label>
                                <input type="text"
                                       name="address_note"
                                       id="address_note"
                                       placeholder="e.g., Near the red gate, 2nd floor, ring the bell twice"
                                       class="w-full px-4 py-4 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300">
                                <p class="text-sm text-gray-500 mt-2">Help our delivery person find you easily</p>
                            </div>

                            {{-- Contact Number --}}
                            <div>
                                <label for="contact" class="block text-sm font-bold text-ancient mb-3">
                                    Contact Number *
                                </label>
                                <input type="tel"
                                       name="contact"
                                       id="contact"
                                       placeholder="+977 98xxxxxxxx"
                                       class="w-full px-4 py-4 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300"
                                       required>
                                <p class="text-sm text-gray-500 mt-2">We'll contact you for delivery updates</p>
                            </div>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-secondary text-ancient rounded-full flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-ancient">Payment Method</h2>
                        </div>

                        <div>
                            <label for="payment" class="block text-sm font-bold text-ancient mb-3">
                                Select Payment Method *
                            </label>
                            <select name="payment" id="payment"
                                    class="w-full px-4 py-4 rounded-lg border-2 border-gray-200 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all duration-300 text-paragraph bg-white">
                                <option value="">Choose payment method</option>
                                <option value="cod">💰 Cash On Delivery</option>
                                <option value="khalti">📱 Khalti Digital Payment</option>
                            </select>
                            <p class="text-sm text-gray-500 mt-2 flex items-center">
                                <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                All payments are secure and encrypted
                            </p>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
                        <button type="submit"
                                class="w-full bg-primary hover:bg-green-700 text-white py-4 px-6 rounded-lg font-bold text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center mb-4">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Place Order
                        </button>

                        {{-- Security Notice --}}
                        <div class="text-center">
                            <p class="text-xs text-gray-500 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Secure & Encrypted Order
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    {{-- Additional Features Section --}}
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-bold text-ancient text-center mb-8">Why Choose Us?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-white rounded-xl shadow-md">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-ancient mb-2">Fast Delivery</h3>
                        <p class="text-paragraph text-sm">Quick and reliable delivery to your doorstep</p>
                    </div>
                    <div class="text-center p-6 bg-white rounded-xl shadow-md">
                        <div class="w-16 h-16 bg-secondary/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.031 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-ancient mb-2">Secure Payment</h3>
                        <p class="text-paragraph text-sm">Your payment information is safe and secure</p>
                    </div>
                    <div class="text-center p-6 bg-white rounded-xl shadow-md">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-bold text-ancient mb-2">Quality Assured</h3>
                        <p class="text-paragraph text-sm">Fresh and quality products guaranteed</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JavaScript for Form Validation --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form validation
            const form = document.querySelector('form');
            const submitButton = document.querySelector('button[type="submit"]');

            form.addEventListener('submit', function(e) {
                const address = document.getElementById('address').value;
                const contact = document.getElementById('contact').value;
                const payment = document.getElementById('payment').value;

                if (!address) {
                    e.preventDefault();
                    alert('Please select a delivery address.');
                    document.getElementById('address').focus();
                    return;
                }

                if (!contact.trim()) {
                    e.preventDefault();
                    alert('Please enter your contact number.');
                    document.getElementById('contact').focus();
                    return;
                }

                if (!payment) {
                    e.preventDefault();
                    alert('Please select a payment method.');
                    document.getElementById('payment').focus();
                    return;
                }

                // Add loading state to button
                submitButton.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Processing Order...
                `;
                submitButton.disabled = true;
            });
        });
    </script>
</x-frontend-layout>

<x-frontend-footer>

</x-frontend-footer>
