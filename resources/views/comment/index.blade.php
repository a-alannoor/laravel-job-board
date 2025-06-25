<x-layout :title="$pageTitle">
    @foreach($comments as $comment)
        <div><a href="comment/{{ $comment->id }}">{{ $comment->content }}</a></div>
        <span>Author: {{ $comment->author }}</span>
        <hr>
    @endforeach
    {{ $comments->links() }}
</x-layout>