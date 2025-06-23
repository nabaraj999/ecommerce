<x-frontend-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Order Details</h1>
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Order ID: {{ $order->id }}</h2>
            <p><strong>Total:</strong> NPR {{ number_format($order->total_amount, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Payment Status:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}</p>
            <p><strong>Placed On:</strong> {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : 'N/A' }}</p>
            <p><strong>Vendor:</strong> {{ $order->vendor ? $order->vendor->name : 'N/A' }}</p>
            <p><strong>Delivery Address:</strong> {{ $order->availableAddress ? $order->availableAddress->address : 'N/A' }}</p>
            <p><strong>Contact:</strong> {{ $order->contact ?? 'N/A' }}</p>
            <p><strong>Address Note:</strong> {{ $order->address_note ?? 'N/A' }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>

            <h3 class="text-lg font-semibold mt-6 mb-4">Order Items</h3>
            <div class="grid gap-4">
                @forelse($order->orderDescriptions as $item)
                    <div class="flex justify-between items-center border-b py-2">
                        <div>
                            <p class="font-medium">{{ $item->product ? $item->product->name : 'Product Unavailable' }}</p>
                            <p class="text-sm text-gray-600">Quantity: {{ $item->qty }}</p>
                        </div>
                        <p>NPR {{ number_format($item->amount, 2) }}</p>
                    </div>
                @empty
                    <p class="text-gray-600">No items found for this order.</p>
                @endforelse
            </div>
        </div>
        <a href="{{ route('orders.index') }}"
           class="mt-6 inline-block text-blue-600 hover:text-red-600">
            Back to Orders
        </a>
    </div>
</x-frontend-layout>
