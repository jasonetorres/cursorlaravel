<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-medium">{{ __("Your Schedule") }}</h3>
                        <div class="space-x-2">
                            <button onclick="changeView('day')" class="px-3 py-1 text-white bg-blue-500 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">{{ __("Day") }}</button>
                            <button onclick="changeView('week')" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">{{ __("Week") }}</button>
                            <button onclick="changeView('month')" class="px-3 py-1 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">{{ __("Month") }}</button>
                        </div>
                    </div>
                    
                    <!-- Calendar Views -->
                    <div id="calendar-container" class="p-4 bg-gray-100 rounded-lg dark:bg-gray-700">
                        <!-- Day View -->
                        <div id="day-view">
                            <h4 class="mb-2 font-semibold">{{ now()->format('l, F j, Y') }}</h4>
                            <div class="space-y-2">
                                @for ($hour = 9; $hour <= 17; $hour++)
                                    <div class="flex items-center">
                                        <div class="w-20 pr-4 text-sm text-right text-gray-600 dark:text-gray-400">
                                            {{ sprintf('%02d:00', $hour) }}
                                        </div>
                                        <div class="flex-grow h-12 bg-white border border-gray-200 rounded dark:bg-gray-600 dark:border-gray-700">
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
                            <h4 class="mb-2 font-semibold">{{ __("Week of") }} {{ now()->startOfWeek()->format('F j, Y') }}</h4>
                            <div class="grid grid-cols-7 gap-2">
                                @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                    <div class="font-semibold text-center">{{ $day }}</div>
                                @endforeach
                                @for ($i = 0; $i < 7; $i++)
                                    <div class="p-2 bg-white border border-gray-200 rounded dark:bg-gray-600 dark:border-gray-700">
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
                            <h4 class="mb-2 font-semibold">{{ now()->format('F Y') }}</h4>
                            <div class="grid grid-cols-7 gap-2">
                                @foreach(['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                    <div class="text-sm font-semibold text-center">{{ $day }}</div>
                                @endforeach
                                @for ($i = 1; $i <= now()->daysInMonth; $i++)
                                    <div class="p-2 bg-white border border-gray-200 rounded dark:bg-gray-600 dark:border-gray-700">
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
    </div>

    @push('scripts')
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
    @endpush
</x-app-layout>