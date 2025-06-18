<div>
    <h1>Welcome Mr. Abdullah <small>PMP® PMI-ACP</small></h1>
    @foreach ($jobs as $job)
        <div>{{ $job['title'] }}: {{ $job['salary'] }}</div>
    @endforeach
    <p>My name as is: {{ $name }}</p>
</div>