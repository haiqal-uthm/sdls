<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight text-center">
            {{ __('Add New Room') }}
        </h2>
    </x-slot>

    <div class="py-10 flex justify-center">
        <div class="max-w-lg w-full sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('room.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Room Name</label>
                    <input name="name" type="text" class="form-input w-full dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Level</label>
                    <input name="level" type="text" class="form-input w-full dark:bg-gray-700 dark:text-white" required />
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Status</label>
                    <select name="status" class="form-input w-full dark:bg-gray-700 dark:text-white" required>
                        <option value="Locked">Locked</option>
                        <option value="Unlocked">Unlocked</option>
                        <option value="N/A">N/A</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1">Description</label>
                    <textarea name="description" class="form-input w-full dark:bg-gray-700 dark:text-white"></textarea>
                </div>

                <div class="text-center">
                    <x-primary-button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Save Room') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
