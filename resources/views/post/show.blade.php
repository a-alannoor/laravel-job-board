<x-layout :title="$pageTitle">
    <div>
        <h3>{{ $post->title }}</h3>
        <h4>Published: {{ $post->published }}</h4>
        <p> {{ $post->body }}</p>
        <h6>Author: {{ $post->author }}</h6>
        <hr>
        <h3>Commnets</h3>
        @foreach($post->comments as $comment)
            <p>{{ $comment->content }}</p>
            <span>Author: {{ $comment->author }}</span>
            <br><br>
        @endforeach
    </div>
</x-layout>