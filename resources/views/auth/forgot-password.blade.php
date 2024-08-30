<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyCal - Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-400 to-purple-500">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-xl">
        <div class="mb-8 text-center">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Forgot Password</h1>
            <p class="text-gray-600">Enter your email to reset your password</p>
        </div>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-bold text-gray-700">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end">
                <button type="submit" class="px-4 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>

        @if (session('status'))
            <div class="mt-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
    </div>
</body>
</html>
