<x-frontend-layout>
    <section>
        <div class="w-[66%] m-auto py-10 text-center">
            <h1 class="text-3xl mb-8">
                List your Restaurant or Store at Floor Digital Pvt. Ltd.!
                Reach 1,00,000 + new customers.
            </h1>
            <div class="grid md:grid-cols-2 gap-10">
                <div>
                    <img src="https://www.gemgovregistration.com/images/vendor-registration-services.jpg" alt="">
                </div>

                <div>
                    <form action="{{ route('vendor_request') }}" method="post">
                        @csrf

                        <div class="space-y-4 text-left">
                            <div>
                                <label for="name">Enter Your Shop Name</label>
                                <input type="text" name="name" id="name" class="w-full rounded"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="email">Enter Your Email</label>
                                <input type="email" name="email" id="email" class="w-full rounded"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_no">Enter Your Contact Number</label>
                                <input type="tel" name="contact_no" id="contact_no" class="w-full rounded"
                                    value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <p class="text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <label for="address">Enter Your Address</label>
                                <input type="text" name="address" id="address" class="w-full rounded"
                                    value="{{ old('address') }}">
                                @error('address')
                                    <p class="text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit"
                                    class="bg-[var(--primary-color)] text-white px-4 py-2 rounded">Send Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>