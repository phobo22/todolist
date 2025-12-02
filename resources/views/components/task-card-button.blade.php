@props(['task'])

<div class="card" style="width:25.5rem;height:17rem;">
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
        @auth
            @can('edit', $task)
                <div class="mt-auto d-flex gap-2">
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete this task?');" class="flex-grow-1">
                        @csrf
                        @method('DELETE')

                        @if (request()->is('tasks/*'))
                            <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">
                        @else
                            <input type="hidden" name="redirect_to" value="{{ url()->full() }}">
                        @endif

                        <button type="submit" class="btn btn-danger w-100">Delete</button>
                    </form>

                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-success flex-grow-1">Update</a>
                </div>
            @endcan
        @endauth
    </div>
</div>