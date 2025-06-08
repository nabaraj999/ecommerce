<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 min-h-screen flex items-center justify-center p-4 relative">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white opacity-5 rounded-full animate-pulse"></div>
        <div class="absolute top-3/4 right-1/4 w-32 h-32 bg-white opacity-5 rounded-full animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-48 h-48 bg-white opacity-5 rounded-full animate-ping"></div>
    </div>

    <!-- Login Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}" class="bg-white bg-opacity-95 backdrop-blur-lg p-8 rounded-2xl shadow-2xl border border-white border-opacity-20">
            @csrf

            <!-- Login Title -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Login</h2>
                <p class="text-gray-600 mt-2">Please sign in to your account</p>
            </div>

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
                           class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg"
                           placeholder="Enter your email"
                           required
                           autofocus>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Password Field -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Password
                </label>
                <div class="relative">
                    <input type="password"
                           id="password"
                           name="password"
                           class="w-full px-4 py-3 pl-12 pr-12 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg"
                           placeholder="Enter your password"
                           required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <button type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg id="eyeIcon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="eyeOffIcon" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <script>
                function togglePassword() {
                    const passwordInput = document.getElementById('password');
                    const eyeIcon = document.getElementById('eyeIcon');
                    const eyeOffIcon = document.getElementById('eyeOffIcon');

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeIcon.classList.add('hidden');
                        eyeOffIcon.classList.remove('hidden');
                    } else {
                        passwordInput.type = 'password';
                        eyeIcon.classList.remove('hidden');
                        eyeOffIcon.classList.add('hidden');
                    }
                }
            </script>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                    Forgot Password?
                </a>
            </div>

            <!-- Login Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-4 rounded-xl font-semibold text-lg shadow-lg hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Sign In
            </button>


        </form>

        <!-- Footer Links -->
        <div class="text-center mt-6">
            <p class="text-blue-100 text-sm">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-white font-semibold hover:text-yellow-300 transition-colors duration-200 underline decoration-2 underline-offset-2">
                    Sign up here
                </a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
        <p class="text-blue-200 text-xs">© 2024 Your Company. All rights reserved.</p>
    </div>
</body>

</html>
