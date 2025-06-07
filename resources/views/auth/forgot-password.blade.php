
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('password.email') }}" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        @csrf
        <h2 class="text-2xl font-bold mb-4 text-center">Forgot Password</h2>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" class="w-full mb-4 p-2 border rounded" required>

        <button class="w-full bg-yellow-500 text-white py-2 rounded hover:bg-yellow-600">Send Reset Link</button>

        <div class="mt-4 text-center">
            <a href="{{ route('login') }}" class="text-blue-500 text-sm">Back to login</a>
        </div>
    </form>
</body>
</html>
