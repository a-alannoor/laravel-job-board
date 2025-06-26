<x-layout :title="$pageTitle">
    @if(session('success'))
        <div class="bg-green-50 px-3 py-2">
            {{ session('success') }}
        </div>
    @endif
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/post/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
            New Post</a>
    </div>
    @foreach ($posts as $post)
        <div class="flex justify-btween items-center border border-gray-200 px-4 py-6 my-2">
            <div class="flex-grow">
                <h1><a class="font-serif text-lg font-bold" href="post/{{ $post->id }}">{{ $post['title'] }}</a></h1>
                <p class="italic">{{ $post['author'] }}</p>
            </div>
            <div class="flex-shrink-0 ml-4">
                <a class="text-yellow-500 hover:text-grey-500" href="post/{{ $post->id }}/edit">Edit</a>
                <form method="POST" action="/post/{{ $post->id }}" onsubmit="return confirm('Are you sure, this action cannot be reversed?')">
                    @csrf
                    @method('DELETE')
                    <button class="cursor-pointer text-red-500 hover:text-grey-500">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</x-layout>