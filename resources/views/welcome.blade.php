<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartCal - The SMART Calendar App</title>
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
        <div class="text-center">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Welcome to SmartCal</h1>
            <p class="mb-8 text-gray-600">Your simple and easy-to-use calendar app</p>
        </div>

        <div class="space-y-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="block w-full px-4 py-3 font-semibold text-center text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    Go to Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="block w-full px-4 py-3 font-semibold text-center text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block w-full px-4 py-3 font-semibold text-center text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
                        Register
                    </a>
                @endif
            @endauth
        </div>

        <div class="mt-8 text-sm text-center text-gray-600">
            <p>&copy; {{ date('Y') }} SmartCal. Jason Torres.</p>
        </div>
    </div>
</body>
</html>
