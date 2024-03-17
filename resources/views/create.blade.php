@extends('layouts.structure')

@section('content')
    <div class="flex items-center justify-center p-4 md:p-12">
        <div class="mx-auto w-full max-w-md bg-white shadow-md rounded-lg px-6 py-8">
            <h2 class="text-gray-700 text-2xl font-bold mb-4">Create New Post</h2>

            <form action="{{ route('post.store', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" name="title" placeholder="Enter post title">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                Content
            </label>
            <textarea
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="content" name="content" placeholder="Enter post content"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="file">
                Upload File
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="file" type="file" name="file" accept="image/*,video/*">
        </div>
        <div class="flex items-center justify-between">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Submit
            </button>
        </div>
        </form>
    </div>
@endsection
