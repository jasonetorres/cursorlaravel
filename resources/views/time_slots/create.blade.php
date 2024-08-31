<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create Available Time Slots') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('time-slots.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="start_time" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">Start Time</label>
                            <input type="datetime-local" id="start_time" name="start_time" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">End Time</label>
                            <input type="datetime-local" id="end_time" name="end_time" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="is_recurring" class="inline-flex items-center">
                                <input type="checkbox" id="is_recurring" name="is_recurring" class="form-checkbox">
                                <span class="ml-2">Recurring Time Slot</span>
                            </label>
                        </div>

                        <div id="recurring-options" style="display: none;">
                            <div class="mb-4">
                                <label for="recurrence_type" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">Recurrence Type</label>
                                <select id="recurrence_type" name="recurrence_type" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="recurrence_end_date" class="block mb-2 text-sm font-bold text-gray-700 dark:text-gray-300">Recurrence End Date</label>
                                <input type="date" id="recurrence_end_date" name="recurrence_end_date" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none focus:shadow-outline">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Create Time Slot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('is_recurring').addEventListener('change', function() {
            document.getElementById('recurring-options').style.display = this.checked ? 'block' : 'none';
        });
    </script>
</x-app-layout>