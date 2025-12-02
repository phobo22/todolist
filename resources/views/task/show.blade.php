@props(['task'])

@extends('layouts.app')

@section('title', $task->title)

@section('navbar')
    <x-navbar />
@endsection

@section('content')
    <div class="d-flex mt-5 justify-content-center">
        <x-task-card-button :task="$task" />
    </div>
@endsection
