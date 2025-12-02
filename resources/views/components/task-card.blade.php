@props(['task'])

<div class="card" style="width:25.5rem;height:14rem;">
    <div class="card-body d-flex flex-column align-items-space-evenly">
        <a href="{{ route('tasks.show', $task) }}" style="text-decoration:none;color:black;">
            <h5 class="card-title">{{ $task->title }} - {{ $task->category }}</h5>
        </a>
        <h6 class="card-subtitle mb-2 text-muted">{{ $task->deadline }}</h6>
        <p class="card-text mt-2">{{ $task->description }}</p>
        @php
            $color = match($task->status) {
                '0' => 'red',
                '1' => '#DED826',
                '2' => 'green',
                default => 'black',
            };
        @endphp
        <h6 style="color: {{ $color }};margin-top:auto;">{{ $task->status === '0' ? 'To Do' : ($task->status === '1' ? 'In Progress' : 'Done') }}</h6> 
    </div>
</div>