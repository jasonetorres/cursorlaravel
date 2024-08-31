<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'dark' }" 
      x-init="$watch('darkMode', val => document.documentElement.classList.toggle('dark', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartCal - Create Bookable Event</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-r from-blue-400 to-purple-500 dark:from-gray-800 dark:to-gray-900">
    @include('layouts.navigation')
    <div class="container p-8 mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <div class="mb-8 text-center">
                <h1 class="mb-2 text-4xl font-bold text-gray-800">{{ __('Create New Event') }}</h1>
                <p class="text-gray-600">Add a new event to your SmartCal Schedule</p>
            </div>

            <form method="POST" action="{{ route('events.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block mb-2 text-sm font-bold text-gray-700">{{ __('Event Title') }}</label>
                    <input id="title" type="text" name="title" value="{{ old('title') }}" required autofocus
                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="date" class="block mb-2 text-sm font-bold text-gray-700">{{ __('Date') }}</label>
                    <input id="date" type="date" name="date" value="{{ old('date') }}" required
                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('date')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="time" class="block mb-2 text-sm font-bold text-gray-700">{{ __('Time') }}</label>
                    <input id="time" type="time" name="time" value="{{ old('time') }}" required
                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">
                    @error('time')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block mb-2 text-sm font-bold text-gray-700">{{ __('Description') }}</label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 font-semibold text-white transition duration-300 bg-gray-500 rounded-lg hover:bg-gray-600">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" class="px-4 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                        {{ __('Create Event') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
