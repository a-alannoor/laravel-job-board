<x-layout :title="$pageTitle">
    <div>
        @foreach ($tags as $tag)
            <h3>{{ $tag['title'] }}</h3>
        @endforeach
    </div>
</x-layout>