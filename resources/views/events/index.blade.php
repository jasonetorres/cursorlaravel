<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-white sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($events->isEmpty())
                        <p class="text-center text-gray-600 dark:text-gray-400">{{ __('No events found.') }}</p>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($events as $event)
                                <li class="py-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $event->title }}</h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ $event->date->format('F j, Y') }} at {{ $event->time->format('g:i A') }}
                                            </p>
                                            @if($event->description)
                                                <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
                                            @endif
                                        </div>
                                        <div>
                                            <a href="{{ route('events.edit', $event) }}" class="px-4 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                                {{ __('Edit') }}
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            
            <div class="mt-6 text-center">
                <a href="{{ route('events.create') }}" class="px-4 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __('Create New Event') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
