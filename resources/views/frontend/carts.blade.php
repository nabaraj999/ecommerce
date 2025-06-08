
<x-frontend-layout>
    <section>
        <div class="container py-10">
            <div class="mb-5">
                <h1 class="text-2xl font-semibold">Carts</h1>
            </div>

            <div class="space-y-5">
                @foreach ($vendors as $vendor)
                    <div>
                        <h2 class="text-xl mb-2">{{ $vendor->name }}</h2>

                        <table class="w-full text-center">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="p-2">SN</th>
                                    <th class="p-2">Product Name</th>
                                    <th class="p-2">Product Price</th>
                                    <th class="p-2">QTY</th>
                                    <th class="p-2">Amount</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($groupedCarts[$vendor->id] as $index => $cart)
                                    <tr class="border-b border-gray-600">
                                        <td class="p-2">{{ $index + 1 }}</td>
                                        <td class="p-2">{{ Str::limit($cart->product->name, 25, '...') }}</td>
                                        <td class="p-2">{{ $cart->product->price }}</td>
                                        <td class="p-2">{{ $cart->qty }}</td>
                                        <td class="p-2">{{ $cart->amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="text-right mt-2">
                            <button class="bg-[var(--primary-color)] py-1 px-3 rounded text-white">Order</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend-layout>
