
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>

        <label class="block mb-2">Name</label>
        <input type="text" name="name" class="w-full mb-4 p-2 border rounded" required>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" class="w-full mb-4 p-2 border rounded" required>

        <label class="block mb-2">Password</label>
        <input type="password" name="password" class="w-full mb-4 p-2 border rounded" required>

        <label class="block mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full mb-4 p-2 border rounded" required>

        <button class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">Register</button>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blue-500 text-sm">Already have an account?</a>
        </div>
    </form>
</body>

</html>
