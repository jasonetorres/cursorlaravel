<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('All Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($events->isEmpty())
                        <p>{{ __('No events found.') }}</p>
                    @else
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($events as $event)
                                <li class="py-4">
                                    <div class="flex justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ $event->date->format('F j, Y') }} at {{ $event->time->format('g:i A') }}
                                            </p>
                                        </div>
                                        <div>
                                            <a href="{{ route('events.edit', $event) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">Edit</a>
                                        </div>
                                    </div>
                                    @if($event->description)
                                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>