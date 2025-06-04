<x-frontend-layout>
    <section>
        <div class="container mx-auto py-10">
            <h2 class="text-3xl font-bold text-[var(--primary-color)] mb-2">
                Featured Tech Store
            </h2>
            <p class="text-[var(--paragraph)] text-base">
                The nearest store to your location
            </p>
        </div>

        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($vendors as $vendor)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <img class="w-full h-[200px] object-cover" src="{{asset(Storage::url($vendor->profile)) }}" alt="profile">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-[var(--primary-color)]">{{ $vendor->name }}</h3>
                        <p class="text-sm text-[var(--paragraph)]">{{ $vendor->address }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mt-16 py-12">
        <div class="w-[90%] md:w-[70%] mx-auto text-center">
            <h1 class="text-3xl font-bold mb-6">
                List your Restaurant or Store at Floor Digital Pvt. Ltd.!<br>
                <span class="text-[var(--primary-color)]">Reach 1,00,000+ new customers</span>
            </h1>

            <div class="grid md:grid-cols-2 gap-8 mt-10 items-center">
                <div>
                    <img class="rounded-lg shadow" src="https://www.gemgovregistration.com/images/vendor-registration-services.jpg" alt="Registration">
                </div>

                <div class="bg-gray-100 p-6 rounded-lg shadow-md text-left">
                    <form action="{{ route('vendor_request') }}" method="post">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-1">Enter Your Shop Name</label>
                                <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2 rounded" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium mb-1">Enter Your Email</label>
                                <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2 rounded" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_no" class="block text-sm font-medium mb-1">Enter Your Contact Number</label>
                                <input type="tel" name="contact_no" id="contact_no" class="w-full border border-gray-300 p-2 rounded" value="{{ old('contact_no') }}">
                                @error('contact_no')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="address" class="block text-sm font-medium mb-1">Enter Your Address</label>
                                <input type="text" name="address" id="address" class="w-full border border-gray-300 p-2 rounded" value="{{ old('address') }}">
                                @error('address')
                                    <p class="text-red-600 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="bg-[var(--primary-color)] hover:bg-green-700 text-white px-6 py-2 rounded shadow">
                                    Send Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-frontend-layout>
