<x-frontend-layout>
    <section>
        <div class="container py-10">
            <form action="{{route('order_store', $vendor->id)}}" method="post">
                @csrf

                <div>
                    <div>
                        <label for="address">Select Address</label>
                        <select name="address" id="address" class="w-full">
                            @foreach ($addresses as $address)
                                <option value="{{ $address->id }}">{{ $address->address }} (NRs.{{ $address->price }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="address_note">Address Note</label>
                        <input type="text" name="address_note" id="address_note" class="w-full">
                    </div>

                    <div>
                        <label for="contact">Contact No.</label>
                        <input type="text" name="contact" id="contact" class="w-full">
                    </div>

                    <div>
                        <label for="payment">Select Payment Method</label>
                        <select name="payment" id="payment" class="w-full">
                            <option value="cod">Cash On Delivery</option>
                            <option value="khalti">Khalti</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit">Order</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-frontend-layout>
