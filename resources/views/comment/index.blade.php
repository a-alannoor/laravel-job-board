<x-layout :title="$pageTitle">
    @foreach($comments as $comment)
        <div>{{ $comment->content }}</div>
        <span>Author: {{ $comment->author }}</span>
        <hr>
    @endforeach
    {{ $comments->links() }}
</x-layout>