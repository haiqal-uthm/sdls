<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Door Access Monitoring & Management') }}
        </h2>
    </x-slot>

    <div class="mb-4 text-right">
        <center><a href="{{ route('room.create') }}">
            <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Add New Room') }}
            </x-primary-button>
        </a></center>
    </div>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800 dark:text-gray-100"></h2>

                <div class="flex justify-center overflow-x-auto">
                    <table class="w-full max-w-4xl divide-y divide-gray-300 dark:divide-gray-700 text-center shadow-md rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">No</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Room Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Level</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Status</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Room Details</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($rooms as $index => $room)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $room['name'] }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $room['level'] }}</td>
                                    <td class="px-6 py-4 font-semibold">
                                        <span class="{{ $room['status'] === 'Locked' ? 'text-red-500' : 'text-green-500' }}">
                                            {{ $room['status'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('room.details', ['slug' => $room['slug']]) }}"
                                           class="bg-blue-500 hover:bg-blue-600 text-green font-medium py-2 px-4 rounded transition duration-200">
                                            <x-primary-button>{{ __('Room Details') }}</x-primary-button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
