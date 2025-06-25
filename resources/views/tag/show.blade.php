<x-layout :title="$pageTitle">
    @forelse($tag->posts as $post)
        <div> <a href="{{ route('post.show', $post->id) }}"> {{ $post->title }} : {{ $post->author }} </a> </div>
    @empty
    <div>No posts are associated with this tag.</div>
    @endforelse
</x-layout>