<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            User Management
        </h2>
    </x-slot>

    <div class="flex justify-center mb-6">
        <a href="{{ route('users.create') }}"
            class="bg-green-500 text-black px-4 py-2 rounded hover:bg-green-600 transition duration-200">
            <x-primary-button>{{ __('Add New User') }}</x-primary-button>
        </a>
    </div>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="flex justify-center mb-6">
                </div>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-6 text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-center overflow-x-auto">
                    <table class="w-full max-w-4xl divide-y divide-gray-300 dark:divide-gray-700 text-center shadow-md rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Name</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Staff ID</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">RFID ID</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Email</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Position</th>
                                <th class="px-6 py-3 text-xs font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wide">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $user->staff_id }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $user->rfid_id }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $user->position }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="inline-block">
                                            <x-primary-button>
                                                {{ __('Edit') }}
                                            </x-primary-button>
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button>
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
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
