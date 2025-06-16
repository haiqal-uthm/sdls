<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ $roomDetails['name'] }} Details
        </h2>
    </x-slot>

    <div class="py-12 flex justify-center">
        <div class="max-w-md w-full sm:px-4 lg:px-6">
            <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 border border-gray-200 dark:border-gray-700 transition duration-300 ease-in-out">

                <!-- Room Status -->
                <div class="mb-6">
                    <h4 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-100">
                        Room Status:
                        <p class="{{ $roomDetails['status'] === 'N/A' ? 'text-red-500' : 'text-green-400' }}">
                            {{ $roomDetails['status'] }}
                        </p>
                    </h4>
                </div>

                <!-- Description Section -->
                <div class="mb-6">
                    <h4 class="text-2xl font-semibold text-center text-gray-700 dark:text-gray-300 mb-2">
                        Description:
                        <p class="'text-red-500' : 'text-green-400' }}">
                            {{ $roomDetails['description'] }}
                        </p>
                    </h4>
                </div>

                <!-- Action Button -->
                <div class="flex justify-center">
                    <a href="{{ route('room.edit', ['slug' => $roomDetails['slug']]) }}"
                        <center><button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-black font-semibold py-3 rounded-md transition duration-200">
                    <x-primary-button>{{ __('Modify Details') }}</x-primary-button>
                </button></center>                   
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
