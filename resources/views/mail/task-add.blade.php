<h1>Your task has been addeed successfully !!!</h1>
<h3>{{ $task->title }}</h3>
<p>View this task <a href="{{ url('/tasks/' . $task->id) }}">here</a></p>