<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Manage Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        @method('PATCH')
                        
                        <div class="mb-4">
                            <x-input-label for="timezone" :value="__('Timezone')" />
                            <select id="timezone" name="timezone" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($timezones as $tz)
                                    <option value="{{ $tz }}" {{ $tz === $user->timezone ? 'selected' : '' }}>{{ $tz }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('timezone')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="notification_preference" :value="__('Notification Preference')" />
                            <select id="notification_preference" name="notification_preference" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="email" {{ $user->notification_preference === 'email' ? 'selected' : '' }}>Email</option>
                                <option value="sms" {{ $user->notification_preference === 'sms' ? 'selected' : '' }}>SMS</option>
                                <option value="both" {{ $user->notification_preference === 'both' ? 'selected' : '' }}>Both</option>
                            </select>
                            <x-input-error :messages="$errors->get('notification_preference')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Save Settings') }}
                            </x-primary-button>
                        </div>
                    </form>

         <!-- Availability Settings Links -->
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
                            {{ __('Availability Settings') }}
                        </h3>
                        <div class="mt-4 space-y-4">
                            <a href="{{ route('availability.index') }}" class="px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 rounded-md hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                {{ __('View Availability') }}
                            </a>
                            <a href="{{ route('availability.create') }}" class="px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-green-600 rounded-md hover:bg-green-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                {{ __('Create Availability') }}
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>