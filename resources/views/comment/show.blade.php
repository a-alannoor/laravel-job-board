<x-layout :title="$pageTitle">
    <div>{{ $comment->content }}</div>
    <span>Author: {{ $comment->author }}</span>
    <p>Post Author: {{ $comment->post->author }}</p>
</x-layout>