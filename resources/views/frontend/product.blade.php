<x-frontend-layout>
    <!-- Add FontAwesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .alert-message {
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .fade-out {
            animation: fadeOut 0.3s ease-out forwards;
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }
    </style>

    <section class="bg-gradient-to-br from-gray-50 to-white py-8 lg:py-16 min-h-screen">
        <div class="card-wrapper max-w-7xl mx-auto px-4 py-10">

            <!-- Alert Message Container -->
            <div id="alertContainer" class="fixed top-4 right-4 z-50"></div>

            <div class="card bg-white rounded-3xl shadow-2xl overflow-hidden grid lg:grid-cols-2 gap-8 lg:gap-12">

                <!-- Enhanced Product Images Section -->
                <div class="product-imgs p-6 lg:p-8 space-y-6">
                    <!-- Main Image Display -->
                    <div class="img-display overflow-hidden rounded-2xl bg-gray-100 shadow-lg">
                        <div class="img-showcase flex w-full transition-all duration-500 ease-in-out">
                            @foreach ($product->images as $index => $image)
                                <img
                                    src="{{ asset(Storage::url($image)) }}"
                                    alt="{{ ++$index }}"
                                    class="min-w-full h-80 lg:h-96 object-cover"
                                >
                            @endforeach
                        </div>
                    </div>

                    <!-- Enhanced Thumbnail Selection -->
                    <div class="img-select flex gap-3 overflow-x-auto pb-2">
                        @foreach ($product->images as $index => $image)
                            <div class="img-item flex-shrink-0">
                                <a
                                    href="#"
                                    data-id="{{ ++$index }}"
                                    class="block border-2 border-transparent hover:border-purple-500 rounded-xl overflow-hidden transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg"
                                >
                                    <img
                                        class="h-20 w-20 lg:h-24 lg:w-24 object-cover"
                                        src="{{ asset(Storage::url($image)) }}"
                                        alt="{{ $index }}"
                                    >
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Enhanced Product Content Section -->
                <div class="product-content p-6 lg:p-8 space-y-6">

                    <!-- Product Title -->
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 capitalize leading-tight">
                        {{ $product->name }}
                    </h1>

                    <!-- Brand Link -->
                    <div class="flex items-center gap-3">
                        <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-semibold uppercase tracking-wide shadow-lg">
                            Brand: {{ $product->brand }}
                        </span>
                        <div class="h-4 w-px bg-gray-300"></div>
                        @if ($product->qty > 0)
                            <span class="text-green-600 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                In Stock ({{ $product->qty }} available)
                            </span>
                        @else
                            <span class="text-red-600 text-sm font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                </svg>
                                Out of Stock
                            </span>
                        @endif
                    </div>

                    <!-- Enhanced Rating Section -->
                    <div class="product-rating flex items-center gap-4 py-3 border-y border-gray-100">
                        <div class="flex items-center gap-1">
                            <div class="flex text-yellow-400 text-lg">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-700 ml-2 font-semibold">4.7</span>
                            <span class="text-gray-500 text-sm">(21 reviews)</span>
                        </div>
                    </div>

                    <!-- Enhanced Pricing Section -->
                    <div class="product-price space-y-2">
                        @if ($product->discount > 0)
                            <div class="flex items-center gap-4">
                                <span class="text-3xl font-bold text-purple-600">
                                    NRs.{{ number_format($product->price - ($product->price * $product->discount) / 100) }}
                                </span>
                                <span class="text-xl text-red-500 line-through">
                                    NRs.{{ number_format($product->price) }}
                                </span>
                                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-sm font-bold">
                                    {{ $product->discount }}% OFF
                                </span>
                            </div>
                            <p class="text-green-600 font-medium">
                                You save NRs.{{ number_format(($product->price * $product->discount) / 100) }}
                            </p>
                        @else
                            <div class="text-3xl font-bold text-purple-600">
                                NRs.{{ number_format($product->price) }}
                            </div>
                        @endif
                    </div>

                    <div class="purchase-info space-y-4 pt-4 border-t border-gray-100">
                        <!-- Quantity Selector -->
                        <div class="flex items-center gap-4">
                            <label class="text-gray-700 font-medium">Quantity:</label>
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button type="button" class="px-3 py-2 hover:bg-gray-100 transition-colors" onclick="decrementQuantity()">
                                    <i class="fas fa-minus text-gray-600"></i>
                                </button>
                                <input
                                    type="number"
                                    id="quantity"
                                    min="1"
                                    max="{{ $product->qty }}"
                                    value="1"
                                    class="w-16 text-center border-0 focus:ring-0 focus:outline-none py-2"
                                    onchange="validateQuantity()"
                                    onkeyup="validateQuantity()"
                                >
                                <button type="button" class="px-3 py-2 hover:bg-gray-100 transition-colors" onclick="incrementQuantity()">
                                    <i class="fas fa-plus text-gray-600"></i>
                                </button>
                            </div>
                            <span class="text-sm text-gray-500">
                                Max: {{ $product->qty }}
                            </span>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-3">
                            <form action="{{ route('add_to_cart') }}" method="post" id="addToCartForm" class="flex-1">
                                @csrf
                                <input type="hidden" name="qty" id="cartQty" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                @if ($product->qty > 0)
                                    <button
                                        type="submit"
                                        class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
                                        onclick="return validateAndSubmit()"
                                    >
                                        <i class="fas fa-shopping-cart"></i>
                                        Add to Cart
                                    </button>
                                @else
                                    <button
                                        type="button"
                                        class="w-full bg-gray-400 text-white font-bold py-4 px-6 rounded-xl cursor-not-allowed flex items-center justify-center gap-2"
                                        disabled
                                    >
                                        <i class="fas fa-times-circle"></i>
                                        Out of Stock
                                    </button>
                                @endif
                            </form>

                            @if ($product->qty > 0)
                                <button
                                    type="button"
                                    class="flex-1 bg-white border-2 border-purple-600 text-purple-600 hover:bg-purple-600 hover:text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 flex items-center justify-center gap-2"
                                >
                                    <i class="fas fa-heart"></i>
                                    Add to Wishlist
                                </button>
                            @endif
                        </div>

                        <!-- Buy Now Button -->
                        @if ($product->qty > 0)
                            <button
                                class="w-full bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl"
                                onclick="return validateQuantityForBuyNow()"
                            >
                                <i class="fas fa-bolt mr-2"></i>
                                Buy Now
                            </button>
                        @endif
                    </div>

                    <!-- Enhanced Social Links -->
                    <div class="social-links pt-6 border-t border-gray-100">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
                            <span class="text-gray-700 font-medium flex items-center gap-2">
                                <i class="fas fa-share-alt text-purple-600"></i>
                                Share At:
                            </span>
                            <div class="flex gap-3">
                                <a
                                    href="#"
                                    class="w-12 h-12 bg-blue-600 hover:bg-blue-700 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg hover:shadow-xl"
                                    title="Share on Facebook"
                                >
                                    <i class="fab fa-facebook-f text-lg"></i>
                                </a>
                                <a
                                    href="#"
                                    class="w-12 h-12 bg-sky-500 hover:bg-sky-600 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg hover:shadow-xl"
                                    title="Share on Twitter"
                                >
                                    <i class="fab fa-twitter text-lg"></i>
                                </a>
                                <a
                                    href="#"
                                    class="w-12 h-12 bg-pink-600 hover:bg-pink-700 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg hover:shadow-xl"
                                    title="Share on Instagram"
                                >
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                                <a
                                    href="#"
                                    class="w-12 h-12 bg-green-500 hover:bg-green-600 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg hover:shadow-xl"
                                    title="Share on WhatsApp"
                                >
                                    <i class="fab fa-whatsapp text-lg"></i>
                                </a>
                                <a
                                    href="#"
                                    class="w-12 h-12 bg-red-600 hover:bg-red-700 text-white rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 shadow-lg hover:shadow-xl"
                                    title="Share on Pinterest"
                                >
                                    <i class="fab fa-pinterest text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Trust Badges -->
                    <div class="pt-6 border-t border-gray-100">
                        <div class="grid grid-cols-3 gap-6 text-center">
                            <div class="space-y-3">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-100 to-emerald-100 text-green-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                                    <i class="fas fa-shipping-fast text-2xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Free Shipping</p>
                                <p class="text-xs text-gray-500">On orders over $50</p>
                            </div>
                            <div class="space-y-3">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-100 to-sky-100 text-blue-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                                    <i class="fas fa-undo-alt text-2xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Easy Returns</p>
                                <p class="text-xs text-gray-500">30-day return policy</p>
                            </div>
                            <div class="space-y-3">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-100 to-pink-100 text-purple-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                                    <i class="fas fa-shield-alt text-2xl"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Secure Payment</p>
                                <p class="text-xs text-gray-500">SSL encrypted checkout</p>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Product Details -->
                    <div class="product-detail space-y-4">
                        <h2 class="text-xl font-bold text-gray-900 capitalize flex items-center gap-2">
                            <i class="fas fa-info-circle text-purple-600"></i>
                            About this item
                        </h2>
                        <div class="bg-gray-50 rounded-xl p-4 prose prose-sm max-w-none text-gray-700 leading-relaxed">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const maxQuantity = {{ $product->qty }};

        // Alert function
        function showAlert(message, type = 'error') {
            const alertContainer = document.getElementById('alertContainer');
            const alertId = 'alert-' + Date.now();

            const alertHtml = `
                <div id="${alertId}" class="alert-message mb-3 max-w-sm ${type === 'error' ? 'bg-red-100 border border-red-400 text-red-700' : 'bg-green-100 border border-green-400 text-green-700'} px-4 py-3 rounded-lg shadow-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <i class="fas ${type === 'error' ? 'fa-exclamation-triangle' : 'fa-check-circle'} mr-2"></i>
                            <span class="text-sm font-medium">${message}</span>
                        </div>
                        <button onclick="dismissAlert('${alertId}')" class="ml-2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            `;

            alertContainer.insertAdjacentHTML('beforeend', alertHtml);

            // Auto dismiss after 5 seconds
            setTimeout(() => {
                dismissAlert(alertId);
            }, 5000);
        }

        function dismissAlert(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.classList.add('fade-out');
                setTimeout(() => {
                    alert.remove();
                }, 300);
            }
        }

        // Quantity validation
        function validateQuantity() {
            const quantityInput = document.getElementById('quantity');
            const cartQtyInput = document.getElementById('cartQty');
            let quantity = parseInt(quantityInput.value);

            if (isNaN(quantity) || quantity < 1) {
                quantity = 1;
                quantityInput.value = 1;
            } else if (quantity > maxQuantity) {
                quantity = maxQuantity;
                quantityInput.value = maxQuantity;
                showAlert(`Maximum available quantity is ${maxQuantity}`, 'error');
            }

            cartQtyInput.value = quantity;
            return quantity;
        }

        function validateAndSubmit() {
            if (maxQuantity === 0) {
                showAlert('This product is out of stock', 'error');
                return false;
            }

            const quantity = validateQuantity();

            if (quantity > maxQuantity) {
                showAlert(`Cannot add ${quantity} items. Only ${maxQuantity} available in stock.`, 'error');
                return false;
            }

            return true;
        }

        function validateQuantityForBuyNow() {
            if (maxQuantity === 0) {
                showAlert('This product is out of stock', 'error');
                return false;
            }

            const quantity = validateQuantity();

            if (quantity > maxQuantity) {
                showAlert(`Cannot buy ${quantity} items. Only ${maxQuantity} available in stock.`, 'error');
                return false;
            }

            // If validation passes, you can redirect to checkout or handle buy now logic
            showAlert('Redirecting to checkout...', 'success');
            // Add your buy now logic here
            return true;
        }

        // Quantity Controls
        function incrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);

            if (currentValue < maxQuantity) {
                quantityInput.value = currentValue + 1;
                validateQuantity();
            } else {
                showAlert(`Maximum available quantity is ${maxQuantity}`, 'error');
            }
        }

        function decrementQuantity() {
            const quantityInput = document.getElementById('quantity');
            const currentValue = parseInt(quantityInput.value);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                validateQuantity();
            }
        }

        // Image slider functionality
        const imgs = document.querySelectorAll('.img-select a');
        const imgBtns = [...imgs];
        let imgId = 1;

        imgBtns.forEach((imgItem) => {
            imgItem.addEventListener('click', (event) => {
                event.preventDefault();

                // Remove active state from all thumbnails
                imgBtns.forEach(btn => btn.classList.remove('border-purple-500'));
                imgBtns.forEach(btn => btn.classList.add('border-transparent'));

                // Add active state to clicked thumbnail
                imgItem.classList.remove('border-transparent');
                imgItem.classList.add('border-purple-500');

                imgId = imgItem.dataset.id;
                slideImage();
            });
        });

        function slideImage() {
            const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;
            document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
        }

        // Set first thumbnail as active by default
        if (imgBtns.length > 0) {
            imgBtns[0].classList.remove('border-transparent');
            imgBtns[0].classList.add('border-purple-500');
        }

        window.addEventListener('resize', slideImage);
    </script>
</x-frontend-layout>
