<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Reset Your Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-amber-500 via-orange-500 to-red-600 min-h-screen flex items-center justify-center p-4 relative">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white opacity-5 rounded-full animate-pulse"></div>
        <div class="absolute top-3/4 right-1/4 w-32 h-32 bg-white opacity-5 rounded-full animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-48 h-48 bg-white opacity-5 rounded-full animate-ping"></div>
    </div>

    <!-- Forgot Password Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Forgot Password Form -->
        <form method="POST" action="{{ route('password.email') }}" class="bg-white bg-opacity-95 backdrop-blur-lg p-8 rounded-2xl shadow-2xl border border-white border-opacity-20">
            @csrf

            <!-- Header Section -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-amber-500 bg-opacity-20 backdrop-blur-sm rounded-full mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Forgot Password?</h2>
                <p class="text-gray-600 text-sm">No worries! Enter your email and we'll send you a reset link</p>
            </div>

            <!-- Success/Error Messages -->
            @if (session('status'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Email Field -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                    Email Address
                </label>
                <div class="relative">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg"
                           placeholder="Enter your registered email"
                           required
                           autofocus>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Info Box -->
            <div class="mb-6 p-4 bg-amber-50 border border-amber-200 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-amber-500 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div class="text-sm text-amber-700">
                        <p class="font-medium mb-1">What happens next?</p>
                        <p>We'll send a secure password reset link to your email. Click the link to create a new password for your account.</p>
                    </div>
                </div>
            </div>

            <!-- Send Reset Link Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-amber-500 to-orange-500 text-white py-3 px-4 rounded-xl font-semibold text-lg shadow-lg hover:from-amber-600 hover:to-orange-600 focus:ring-4 focus:ring-amber-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                </svg>
                Send Reset Link
            </button>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Remember your password?</span>
                </div>
            </div>

            <!-- Back to Login -->
            <div class="text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Login
                </a>
            </div>
        </form>

        <!-- Additional Help -->
        <div class="text-center mt-6">
            <p class="text-orange-100 text-sm">
                Still having trouble?
                <a href="#" class="text-white font-semibold hover:text-yellow-300 transition-colors duration-200 underline decoration-2 underline-offset-2">
                    Contact Support
                </a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
        <p class="text-orange-200 text-xs">© 2024 Your Company. All rights reserved.</p>
    </div>
</body>

</html> 
