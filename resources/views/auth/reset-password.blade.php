
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" action="{{ route('password.update') }}" class="bg-white p-6 rounded shadow-md w-full max-w-sm">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <h2 class="text-2xl font-bold mb-4 text-center">Reset Password</h2>

        <label class="block mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="w-full mb-4 p-2 border rounded" required>

        <label class="block mb-2">New Password</label>
        <input type="password" name="password" class="w-full mb-4 p-2 border rounded" required>

        <label class="block mb-2">Confirm Password</label>
        <input type="password" name="password_confirmation" class="w-full mb-4 p-2 border rounded" required>

        <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Reset Password</button>
    </form>
</body>
</html>
