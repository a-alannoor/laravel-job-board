<x-layout :title="$pageTitle">
    @if(session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif
    <div>
        <h3 class="font-serif text-lg font-bold">{{ $post->title }}</h3>
        <p class="font-mono"> {{ $post->body }}</p>
        <p>Author: <span class="italic font-medium">{{ $post->author }}</span></p>
        <h4>Published: {{ $post->published }}</h4>
        <ul class="mt-6 space-y-0">
            @foreach($post->comments()->latest()->get() as $comment)
                <li class="p-4 bg-gray-100 rounded-md shadow-sm">
                    <p class="txt-grey-800">{{ $comment->content }}</p>
                    <span class="mt-1 text-sm text-grey-600">--{{ $comment->author }}</span>
                </li>
                <br><br>
            @endforeach
        </ul>
    </div>
    <form method="POST" action="/comment">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">Create New Comment</h2>
                <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed your new comment.</p>

                <!-- @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif -->


                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


                    <div class="col-span-full">
                        <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
                        <div class="mt-2">
                            <input type="text" name="author" value="{{ old('author') }}" id="author"
                                autocomplete="family-name"
                                class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300'}} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        </div>
                        @error('author')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                        <div class="mt-2">
                            <textarea name="content" id="content" rows="3"
                                class="{{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300'}} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
                        </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences content comment.</p>
                        @error('content')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</x-layout>