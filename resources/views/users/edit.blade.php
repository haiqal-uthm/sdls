<x-app-layout>
    <x-slot name="header">
        <center><h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Edit User
        </h2></center>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('users.form', ['user' => $user])

            <center><button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-black font-semibold py-3 rounded-md transition duration-200">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
            </button></center>          
        </form>
    </div>
</x-app-layout>
