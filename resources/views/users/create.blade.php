<x-app-layout>
    <x-slot name="header">
        <center><h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Add New User
        </h2></center>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            @include('users.form')

            <center><button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-black font-semibold py-3 rounded-md transition duration-200">
                    <x-primary-button>{{ __('Create') }}</x-primary-button>
            </button></center>        
        </form>
    </div>
</x-app-layout>
