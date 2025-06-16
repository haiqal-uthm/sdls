<x-app-layout>
    <x-slot name="header">
        <center>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            Room Access Logs & Report
        </h2>
        </center>
        <div class="mb-4 flex justify-end">
            <a href="{{ route('logs.export.pdf', ['room_name' => request('room_name'), 'date' => request('date')]) }}">
                <x-danger-button class="ms-3">
                    {{ __('Export PDF') }}
                </x-danger-button>
            </a>
        </div>
    </x-slot>

    <center><form method="GET" action="{{ route('logs.index') }}" class="mb-4">
        <div>
            <label for="room_name">Room:</label>
            <select name="room_name">
                <option value="">-- Select Room --</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->name }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="{{ $selectedDate }}">
        </div>

        <x-primary-button type="submit" class="mt-4">
            {{ __('Filter') }}
        </x-primary-button>
    </form></center>


    <div class="py-12 flex justify-center">
        <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6">
                <div class="overflow-x-auto flex justify-center">
                    <table class="w-auto divide-y divide-gray-200 dark:divide-gray-700 text-center">
                        <thead class="bg-indigo-100 dark:bg-indigo-700">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold text-indigo-900 dark:text-indigo-200 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-xs font-bold text-indigo-900 dark:text-indigo-200 uppercase tracking-wider">Room Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-indigo-900 dark:text-indigo-200 uppercase tracking-wider">Accessed By</th>
                                <th class="px-6 py-3 text-xs font-bold text-indigo-900 dark:text-indigo-200 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-xs font-bold text-indigo-900 dark:text-indigo-200 uppercase tracking-wider">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($logs as $log)
                                <tr class="hover:bg-indigo-50 dark:hover:bg-indigo-900 transition-colors duration-150">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200 whitespace-nowrap">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200 whitespace-nowrap">{{ $log['room_name'] }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200 whitespace-nowrap">{{ $log['accessed_by'] }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200 whitespace-nowrap">{{ $log['status'] }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200 whitespace-nowrap">{{ $log['timestamp'] }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">No logs available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
