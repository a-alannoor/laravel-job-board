<x-layout :title="$pageTitle">
    <div>
        @foreach ($tags as $tag)
            <div> <a href="/tag/{{ $tag->id }}">{{ $tag['title'] }}</h3> : <span><a href="postAttachToTag/01979d71-9df9-7244-a5dd-0154f807de39">Attach it with post</a></span></div>
        @endforeach
    </div>
</x-layout>