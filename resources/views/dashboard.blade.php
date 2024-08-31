<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'dark' }" 
      x-init="$watch('darkMode', val => document.documentElement.classList.toggle('dark', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SmartCal - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-r from-blue-400 to-purple-500 dark:from-gray-800 dark:to-gray-900">
    @include('layouts.navigation')
    <div class="container p-8 mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl dark:bg-gray-700">
            <div class="mb-8 text-center">
                <h1 class="mb-2 text-4xl font-bold text-gray-800 dark:text-white">{{ __('Dashboard') }}</h1>
                <p class="text-gray-600 dark:text-gray-300">Your SmartCal Schedule</p>
            </div>

            <div class="mb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-800">{{ __("Your Schedule") }}</h3>
                    <div class="space-x-2">
                        <button onclick="changeView('day')" class="px-4 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">{{ __("Day") }}</button>
                        <button onclick="changeView('week')" class="px-4 py-2 font-semibold text-gray-700 transition duration-300 bg-gray-200 rounded-lg hover:bg-gray-300">{{ __("Week") }}</button>
                        <button onclick="changeView('month')" class="px-4 py-2 font-semibold text-gray-700 transition duration-300 bg-gray-200 rounded-lg hover:bg-gray-300">{{ __("Month") }}</button>
                    </div>
                </div>
                
                <!-- Calendar Views -->
                <div id="calendar-container" class="p-4 bg-white rounded-lg">
                    <!-- Day View -->
                    <div id="day-view">
                        <h4 class="mb-4 font-semibold">{{ now()->format('l, F j, Y') }}</h4>
                        <div class="space-y-2">
                            @for ($hour = 9; $hour <= 17; $hour++)
                                <div class="flex items-center">
                                    <div class="w-20 pr-4 text-sm text-right text-gray-600">
                                        {{ sprintf('%02d:00', $hour) }}
                                    </div>
                                    <div class="flex-grow h-12 bg-gray-100 border border-gray-200 rounded">
                                        @foreach($events as $event)
                                            @if($event->date->isToday() && $event->time->hour == $hour)
                                                <div class="p-1 text-sm text-white bg-blue-500 rounded">{{ $event->title }}</div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Week View (Initially hidden) -->
                    <div id="week-view" class="hidden">
                        <h4 class="mb-4 font-semibold">{{ __("Week of") }} {{ now()->startOfWeek()->format('F j, Y') }}</h4>
                        <div class="grid grid-cols-7 gap-2">
                            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                <div class="font-semibold text-center">{{ $day }}</div>
                            @endforeach
                            @for ($i = 0; $i < 7; $i++)
                                <div class="p-2 bg-gray-100 border border-gray-200 rounded">
                                    <div class="text-sm">{{ now()->startOfWeek()->addDays($i)->format('j') }}</div>
                                    @foreach($events as $event)
                                        @if($event->date->format('Y-m-d') == now()->startOfWeek()->addDays($i)->format('Y-m-d'))
                                            <div class="px-1 mt-1 text-xs text-white bg-blue-500 rounded">{{ $event->title }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            @endfor
                        </div>
                    </div>

                    <!-- Month View (Initially hidden) -->
                    <div id="month-view" class="hidden">
                        <h4 class="mb-4 font-semibold">{{ now()->format('F Y') }}</h4>
                        <div class="grid grid-cols-7 gap-2">
                            @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                <div class="text-sm font-semibold text-center">{{ $day }}</div>
                            @endforeach
                            @for ($i = 1; $i <= now()->daysInMonth; $i++)
                                <div class="p-2 bg-gray-100 border border-gray-200 rounded">
                                    <div class="text-sm">{{ $i }}</div>
                                    @foreach($events as $event)
                                        @if($event->date->format('j') == $i)
                                            <div class="px-1 mt-1 text-xs text-white bg-blue-500 rounded">{{ $event->title }}</div>
                                        @endif
                                    @endforeach
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeView(view) {
            const views = ['day-view', 'week-view', 'month-view'];
            views.forEach(v => {
                document.getElementById(v).classList.add('hidden');
            });
            document.getElementById(`${view}-view`).classList.remove('hidden');

            // Update button styles
            const buttons = document.querySelectorAll('#calendar-container button');
            buttons.forEach(button => {
                button.classList.remove('bg-blue-500', 'text-white');
                button.classList.add('bg-gray-200', 'text-gray-700');
            });
            event.target.classList.remove('bg-gray-200', 'text-gray-700');
            event.target.classList.add('bg-blue-500', 'text-white');
        }
    </script>
</body>
</html>