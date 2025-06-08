<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Create Account</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-br from-green-600 via-teal-600 to-blue-700 min-h-screen flex items-center justify-center p-4 relative">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white opacity-5 rounded-full animate-pulse"></div>
        <div class="absolute top-3/4 right-1/4 w-32 h-32 bg-white opacity-5 rounded-full animate-bounce"></div>
        <div class="absolute bottom-1/4 left-1/3 w-48 h-48 bg-white opacity-5 rounded-full animate-ping"></div>
    </div>

    <!-- Register Container -->
    <div class="relative z-10 w-full max-w-md">
        <!-- Register Form -->
        <form method="POST" action="{{ route('register') }}" class="bg-white bg-opacity-95 backdrop-blur-lg p-6 rounded-2xl shadow-2xl border border-white border-opacity-20">
            @csrf

            <!-- Register Title -->
            <div class="text-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Create Account</h2>
                <p class="text-gray-600 mt-1 text-sm">Join us today and get started</p>
            </div>

            <!-- Name Field -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-1">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Full Name
                </label>
                <div class="relative">
                    <input type="text"
                           name="name"
                           class="w-full px-3 py-2.5 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg text-sm"
                           placeholder="Enter your full name"
                           required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-1">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                    </svg>
                    Email Address
                </label>
                <div class="relative">
                    <input type="email"
                           name="email"
                           class="w-full px-3 py-2.5 pl-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg text-sm"
                           placeholder="Enter your email"
                           required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-1">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    Password
                </label>
                <div class="relative">
                    <input type="password"
                           id="password"
                           name="password"
                           class="w-full px-3 py-2.5 pl-10 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg text-sm"
                           placeholder="Create a password"
                           required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <button type="button"
                            onclick="togglePassword('password')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg id="eyeIcon1" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="eyeOffIcon1" class="h-4 w-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Confirm Password Field -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-1">
                    <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Confirm Password
                </label>
                <div class="relative">
                    <input type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           class="w-full px-3 py-2.5 pl-10 pr-10 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 bg-gray-50 focus:bg-white focus:shadow-lg text-sm"
                           placeholder="Confirm your password"
                           required>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <button type="button"
                            onclick="togglePassword('password_confirmation')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg id="eyeIcon2" class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <svg id="eyeOffIcon2" class="h-4 w-4 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Terms and Conditions -->
            <div class="flex items-center mb-4">
                <input type="checkbox" id="terms" class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded" required>
                <label for="terms" class="ml-2 block text-xs text-gray-700">
                    I agree to the
                    <a href="#" class="text-green-600 hover:text-green-800 font-medium">Terms and Conditions</a>
                    and
                    <a href="#" class="text-green-600 hover:text-green-800 font-medium">Privacy Policy</a>
                </label>
            </div>

            <!-- Register Button -->
            <button type="submit" class="w-full bg-gradient-to-r from-green-600 to-teal-600 text-white py-2.5 px-4 rounded-lg font-semibold shadow-lg hover:from-green-700 hover:to-teal-700 focus:ring-4 focus:ring-green-300 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                Create Account
            </button>
        </form>

        <!-- Footer Links -->
        <div class="text-center mt-6">
            <p class="text-green-100 text-sm">
                Already have an account?
                <a href="{{ route('login') }}" class="text-white font-semibold hover:text-yellow-300 transition-colors duration-200 underline decoration-2 underline-offset-2">
                    Sign in here
                </a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
        <p class="text-green-200 text-xs">© 2024 Your Company. All rights reserved.</p>
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordInput = document.getElementById(fieldId);
            const iconNumber = fieldId === 'password' ? '1' : '2';
            const eyeIcon = document.getElementById('eyeIcon' + iconNumber);
            const eyeOffIcon = document.getElementById('eyeOffIcon' + iconNumber);

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
</body>

</html>
