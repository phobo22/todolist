@props(['task'])

@extends('layouts.app')

@section('title', 'Update Task')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <div class="d-flex justify-content-center mt-4">
        <div class="border rounded p-4 shadow-sm" style="width: 28rem; background: white;">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <h3 class="text-center mb-3">Update Task</h3>
                <input type="hidden" name="redirect_to" value="{{ url()->previous() }}">

                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    @error('title')
                        <div class="text-danger fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label fw-bold">Category</label>
                    <select class="form-select" aria-label="Default select example" id="category" name="category">
                        <option value="cat1" {{ $task->category === 'cat1' ? 'selected' : '' }}>Cat 1</option>
                        <option value="cat2" {{ $task->category === 'cat2' ? 'selected' : '' }}>Cat 2</option>
                        <option value="cat3" {{ $task->category === 'cat3' ? 'selected' : '' }}>Cat 3</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label fw-bold">Deadline:</label>
                    @error('deadline')
                        <div class="text-danger fw-bold">
                            {{ $message }}
                        </div>
                    @enderror
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $task->deadline }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status</label>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="todo" value="0" {{ $task->status === '0' ? 'checked' : '' }}>
                        <label class="form-check-label" for="todo">To Do</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="inprogress" value="1" {{ $task->status === '1' ? 'checked' : '' }}>
                        <label class="form-check-label" for="inprogress">In Progress</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="done" value="2" {{ $task->status === '2' ? 'checked' : '' }}>
                        <label class="form-check-label" for="done">Done</label>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ url()->previous() }}" class="btn btn-danger flex-grow-1">Disacard</a>
                    <button type="submit" class="btn btn-primary flex-grow-1">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection