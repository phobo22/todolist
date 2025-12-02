@extends('layouts.app')

@section('title', 'Add new task')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-center mt-4">
        <div class="border rounded p-4 shadow-sm" style="width: 28rem; background: white;">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <h3 class="text-center mb-3">Add New Task</h3>
                <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    @error('title')
                        <div class="text-danger fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-bold">Category</label>
                    <select class="form-select" aria-label="Default select example" id="category" name="category">
                        <option selected>Choose category for this task</option>
                        <option value="cat1">Cat 1</option>
                        <option value="cat2">Cat 2</option>
                        <option value="cat3">Cat 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label fw-bold">Deadline</label>
                    @error('deadline')
                        <div class="text-danger fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="date" class="form-control" id="deadline" name="deadline">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="todo" value="0" checked>
                        <label class="form-check-label" for="todo">To Do</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="inprogress" value="1">
                        <label class="form-check-label" for="inprogress">In Progress</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="done" value="2">
                        <label class="form-check-label" for="done">Done</label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary flex-grow-1">Cancel</a>
                    <button type="submit" class="btn btn-primary flex-grow-1">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
