@props(['tasks', 'categories', 'status', 'searchTitle'])

@extends('layouts.app')

@section('navbar')
    <x-navbar page="home" />
@endsection

@section('content')
    @if (session('msg'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif

    <div class="container" style="margin-top:30px;">
        <div class="d-flex flex-row ">
            <x-filter page="home" :categories="$categories" :status="$status" :searchTitle="$searchTitle" />
        </div>
        <div class="row g-4">
            @foreach ($tasks as $task)
                <div class="col-4">
                    <div class="p-1 bg-light"><x-task-card :task="$task"/></div>
                </div>
            @endforeach
            {{ $tasks->links('pagination::bootstrap-5') }}  
        </div>
    </div>
@endsection
