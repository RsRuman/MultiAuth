<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blogger Dashboard') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="py-2" id="success">
        <div class="max-w-7xl mx-auto sm:px-6">
            <div class="bg-green-500 float-right h-12 rounded w-1/3">
                <p class="py-3 text-center text-white">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="font-extrabold font-serif p-3 rounded text-3xl text-center text-white" style="background: #354546">Create a New Post</h1>

                    <!-- Create Post Form -->
                    <div class="px-60 py-4" style="background: #e9e9e98c">
                        <form method="post" action="{{ route('post.store') }}" class="bg-white p-10 rounded-3xl" enctype="multipart/form-data">
                            @csrf
                            <label for="title">Post Title</label>
                            @error('title')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" class="border-green-900 h-12 mt-1 rounded text-green-900 w-full" placeholder="Your blog title...">

                            <label for="category">Select Category</label>
                            @error('category')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                            @enderror
                            <select name="category" class="border-green-900 h-12 mt-1 rounded text-green-900 w-full">
                                <option value="hobby">Hobby</option>
                                <option value="sports">Sports</option>
                                <option value="shopping">Shopping</option>
                                <option value="traveling">Traveling</option>
                            </select>

                            <label for="thumbnail">Add Image</label>
                            @error('thumbnail')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                            @enderror
                            <input type="file" name="thumbnail" class="border-green-900 h-12 mt-1 rounded text-green-900 w-full" placeholder="Your blog title...">

                            <label for="body">Post Body</label>
                            @error('body')
                            <div class="mt-1 text-red-500">{{ $message }}</div>
                            @enderror
                            <textarea name="body" class="h-24 mt-1 rounded text-green-900 w-full" placeholder="Write about your blog..."></textarea>
                            <div class="text-center mt-4">
                                <input type="submit" value="Post Now" class="mt-2 px-12 py-2 rounded text-center text-white" style="background: #354546">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

<script>

    if(document.querySelector('#success')){
        setTimeout(hide, 1500);
    }
    function hide(){
        document.querySelector('#success').style.display ='none';
    }


</script>
