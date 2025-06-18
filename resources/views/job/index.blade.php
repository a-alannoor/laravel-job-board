<div>
    <h1>Welcome Mr. Abdullah</h1>
    @foreach ($jobs as $job)
        <div>{{ $job['title'] }}: {{ $job['salary'] }}</div>
    @endforeach
    <p>My name is: {{ $name }}</p>
</div>