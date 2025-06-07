<!DOCTYPE html>
<html lang="en">
<head>
    <title>Email Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-sm text-center">
        <h2 class="text-2xl font-bold mb-4">Verify Your Email</h2>

        <p class="mb-4">A verification link has been sent to your email address.</p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Resend Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button class="text-red-500 text-sm">Logout</button>
        </form>
    </div>
</body>
</html>
