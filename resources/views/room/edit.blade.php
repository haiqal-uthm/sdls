<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
           Edit {{ $roomDetails['name'] }} 
        </h2>
    </x-slot>

    <div class="py-10 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 px-4 py-3 text-green-800 bg-green-100 border border-green-300 rounded-md shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('room.update', ['slug' => $roomDetails['slug']]) }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Room Name</label>
                    <input type="text" class="form-input w-full bg-gray-100 dark:bg-gray-700 cursor-not-allowed" value="{{ $roomDetails['name'] }}" disabled />
                </div>

                <div class="mb-6">
                    <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-input w-full resize-none px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-200">{{ old('description', $roomDetails['description']) }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="status" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select id="status" name="status" class="form-input w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-blue-400 dark:bg-gray-700 dark:text-gray-200">
                        <option value="Locked" {{ $roomDetails['status'] === 'Locked' ? 'selected' : '' }}>Locked</option>
                        <option value="Unlocked" {{ $roomDetails['status'] === 'Unlocked' ? 'selected' : '' }}>Unlocked</option>
                        <option value="N/A" {{ $roomDetails['status'] === 'N/A' ? 'selected' : '' }}>N/A</option>
                    </select>
                </div>
                <center><button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-black font-semibold py-3 rounded-md transition duration-200">
                    <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
