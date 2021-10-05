<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    @foreach($posts as $post)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid grid-cols-6 lg:px-12 mt-1">
                        <img class="col-span-4 col-start-2" src="{{ asset('storage/'.$post->thumbnail) }}">
                    </div>

                    <div>
                        <h1 class="p-1 text-2xl text-center">{{ $post->title }}</h1>
                    </div>

                    <div>
                        <p class="italic px-1">{{ $post->user->name }}</p>
                        <span class="px-1">{{ $post->created_at }}</span>
                    </div>

                    <div>
                        <p class="px-2 py-4">{{ $post->body }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
