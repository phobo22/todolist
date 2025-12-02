@props(['page'])

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">ToDoList</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('tasks.create') }}">Add Task</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('tasks.index') }}">Your Task</a>
                </li>
            </ul>

            @guest
                <div class="d-flex">
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                    <a class="nav-link active" aria-current="page" href="{{ route('register.page') }}">Register</a>   
                </div>
            @endguest

            @auth
                <div class="d-flex">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>  
                </div>
            @endauth
        </div>
    </div>
</nav>