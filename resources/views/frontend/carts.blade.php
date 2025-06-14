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
    </style>

    {{-- Header Section --}}
    <section class="bg-gradient-to-r from-green-50 to-green-100 py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-ancient mb-4 flex items-center justify-center">
                    <svg class="w-10 h-10 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6.5M7 13v8a2 2 0 002 2h8a2 2 0 002-2v-8m-9 4h4"></path>
                    </svg>
                    Your Shopping Cart
                </h1>
                <p class="text-lg text-paragraph">Review your selected items and proceed to checkout</p>
                <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
            </div>
        </div>
    </section>

    {{-- Main Cart Section --}}
    <section class="py-12 min-h-screen">
        <div class="container mx-auto px-4">
            @if($vendors->count() > 0)
                {{-- Cart Items --}}
                <div class="space-y-8">
                    @foreach ($vendors as $vendor)
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-shadow duration-300">
                            {{-- Vendor Header --}}
                            <div class="bg-gradient-to-r from-primary to-green-600 text-white p-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h2 class="text-2xl font-bold">{{ $vendor->name }}</h2>
                                            <p class="text-white/80">{{ count($groupedCarts[$vendor->id]) }} items in cart</p>
                                        </div>
                                    </div>
                                    <div class="bg-white/20 px-4 py-2 rounded-full">
                                        <span class="font-semibold">Order #{{ $vendor->id }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Cart Items Table --}}
                            <div class="overflow-x-auto">
                                <table class="w-full">
                                    <thead class="bg-gray-50 border-b-2 border-primary/20">
                                        <tr>
                                            <th class="px-6 py-4 text-left text-sm font-bold text-ancient uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <span class="w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center text-xs mr-2">#</span>
                                                    Item
                                                </div>
                                            </th>
                                            <th class="px-6 py-4 text-center text-sm font-bold text-ancient uppercase tracking-wider">Product</th>
                                            <th class="px-6 py-4 text-center text-sm font-bold text-ancient uppercase tracking-wider">Price</th>
                                            <th class="px-6 py-4 text-center text-sm font-bold text-ancient uppercase tracking-wider">Quantity</th>
                                            <th class="px-6 py-4 text-center text-sm font-bold text-ancient uppercase tracking-wider">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @php $vendorTotal = 0; @endphp
                                        @foreach ($groupedCarts[$vendor->id] as $index => $cart)
                                            @php $vendorTotal += $cart->amount; @endphp
                                            <tr class="hover:bg-gray-50 transition-colors duration-200 group">
                                                <td class="px-6 py-6">
                                                    <div class="flex items-center">
                                                        <span class="w-8 h-8 bg-gray-100 group-hover:bg-primary group-hover:text-white rounded-full flex items-center justify-center text-sm font-semibold mr-4 transition-all duration-200">
                                                            {{ $index + 1 }}
                                                        </span>
                                                        <div class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
                                                            @if($cart->product->image)
                                                                <img src="{{ asset(Storage::url($cart->product->image)) }}"
                                                                     alt="{{ $cart->product->name }}"
                                                                     class="w-full h-full object-cover">
                                                            @else
                                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                                </svg>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6 text-center">
                                                    <div class="font-semibold text-ancient text-lg">
                                                        {{ Str::limit($cart->product->name, 30, '...') }}
                                                    </div>
                                                    @if($cart->product->description)
                                                        <div class="text-sm text-paragraph mt-1">
                                                            {{ Str::limit($cart->product->description, 50, '...') }}
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-6 text-center">
                                                    <div class="text-lg font-bold text-primary">
                                                        Rs. {{ number_format($cart->product->price, 2) }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6 text-center">
                                                    <div class="flex items-center justify-center">
                                                        <span class="bg-primary text-white px-4 py-2 rounded-full font-bold text-lg min-w-[3rem]">
                                                            {{ $cart->qty }}
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-6 text-center">
                                                    <div class="text-xl font-bold text-ancient">
                                                        Rs. {{ number_format($cart->amount, 2) }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Vendor Total & Checkout --}}
                            <div class="bg-gray-50 px-6 py-6 border-t border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-4">
                                        <div class="text-paragraph">
                                            <span class="font-semibold">{{ count($groupedCarts[$vendor->id]) }} items</span>
                                        </div>
                                        <div class="w-px h-6 bg-gray-300"></div>
                                        <div class="text-ancient">
                                            <span class="text-sm">Subtotal:</span>
                                            <span class="text-2xl font-bold text-primary ml-2">Rs. {{ number_format($vendorTotal, 2) }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        {{-- Continue Shopping --}}
                                        <a href="{{ route('shop', $vendor->id) }}"
                                           class="bg-gray-200 hover:bg-gray-300 text-ancient px-6 py-3 rounded-lg font-semibold transition-colors duration-300 flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                            </svg>
                                            Continue Shopping
                                        </a>

                                        {{-- Checkout Button --}}
                                        <a href="{{ route('checkout', $vendor->id) }}"
                                           class="bg-primary hover:bg-green-700 text-white px-8 py-3 rounded-lg font-bold text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                            </svg>
                                            Proceed to Checkout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Grand Total Section --}}
                @php
                    $grandTotal = 0;
                    foreach($vendors as $vendor) {
                        foreach($groupedCarts[$vendor->id] as $cart) {
                            $grandTotal += $cart->amount;
                        }
                    }
                @endphp

                <div class="mt-8 bg-white rounded-2xl shadow-xl p-8 border-2 border-primary/20">
                    <div class="text-center">
                        <h3 class="text-2xl font-bold text-ancient mb-4">Order Summary</h3>
                        <div class="bg-gradient-to-r from-primary to-green-600 text-white p-6 rounded-xl">
                            <div class="flex items-center justify-center space-x-4">
                                <span class="text-xl">Grand Total:</span>
                                <span class="text-4xl font-bold">Rs. {{ number_format($grandTotal, 2) }}</span>
                            </div>
                        </div>
                        <p class="text-paragraph mt-4">Delivery charges and taxes may apply at checkout</p>
                    </div>
                </div>

            @else
                {{-- Empty Cart State --}}
                <div class="text-center py-20">
                    <div class="max-w-md mx-auto">
                        <div class="w-32 h-32 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-8">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6.5M7 13v8a2 2 0 002 2h8a2 2 0 002-2v-8m-9 4h4"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-ancient mb-4">Your Cart is Empty</h2>
                        <p class="text-paragraph mb-8">Looks like you haven't added any items to your cart yet. Start shopping to fill it up!</p>
                        <a href="{{ route('home') }}"
                           class="bg-primary hover:bg-green-700 text-white px-8 py-4 rounded-lg font-bold text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Start Shopping
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-frontend-layout>
