<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" class="w-full mb-4 p-2 border rounded" required autofocus>

        <label class="block mb-2">Password</label>
        <input type="password" name="password" class="w-full mb-4 p-2 border rounded" required>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>

        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-500 text-sm">Don't have an account?</a><br>
            <a href="{{ route('password.request') }}" class="text-blue-500 text-sm">Forgot Password?</a>
        </div>
    </form>
</body>

</html>
