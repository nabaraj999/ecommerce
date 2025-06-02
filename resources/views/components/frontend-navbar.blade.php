<header class="bg-[var(--primary-color)] py-3 shadow-md sticky top-0">
    <nav class="container flex justify-between items-center gap-10">
        <div class="w-[25%]">
            <img class="h-[40px]" src="{{ asset(Storage::url($company->logo)) }}" alt="">
        </div>

        <div class="w-[50%]">
            <form action="" method="get">
                <div class="flex">
                    <input class="w-full" type="text" name="company" id="company"
                        placeholder="compare products by name">
                    <button type="submit" class="px-4 py-2 bg-gray-100 text-[var(--primary-color)]">Compare</button>
                </div>
            </form>
        </div>
        <div class="w-[25%]">
            <a href="">SignUp</a>
            <a href="">Login</a>
        </div>
    </nav>
</header>
