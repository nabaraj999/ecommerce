<x-frontend-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Your Orders</h1>
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif
        @if($orders->isEmpty())
            <p class="text-gray-600">No orders found.</p>
        @else
            <div class="grid gap-6">
                @foreach($orders as $order)
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <p class="font-semibold">Order ID: {{ $order->id }}</p>
                        <p>Total: NPR {{ number_format($order->total_amount, 2) }}</p>
                        <p>Status: {{ ucfirst($order->status) }}</p>
                        <p>Payment: {{ ucfirst(str_replace('_', ' ', $order->payment_status)) }}</p>
                        <p>Date: {{ $order->created_at ? $order->created_at->format('d M Y') : 'N/A' }}</p>
                        <a href="{{ route('orders.show', $order->id) }}"
                           class="mt-2 inline-block text-blue-600 hover:text-red-600">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-frontend-layout>
<x-frontend-footer>

</x-frontend-footer>
