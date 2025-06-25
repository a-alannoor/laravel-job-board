<x-layout :title="$pageTitle">
    <div>
        <a href="post/create">Create New Post</a>
        @foreach ($posts as $post)
            <div><a href="post/{{ $post->id }}">{{ $post['title'] }}</a></div>
            <h4>Published: {{ $post->published }}</h4>
            <p> {{ $post['body'] }}</p>
            <h6>Author: {{ $post['author'] }}</h6>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-layout>