<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Book a Time Slot') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="available-slots">
                        <!-- This will be populated with available time slots using JavaScript -->
                    </div>
                    <form id="booking-form" style="display: none;">
                        <div class="mb-4">
                            <label for="booker_name" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">Your Name</label>
                            <input type="text" id="booker_name" name="booker_name" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="booker_email" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">Your Email</label>
                            <input type="email" id="booker_email" name="booker_email" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Book Slot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add JavaScript to fetch available time slots and handle booking
    </script>
</x-app-layout>