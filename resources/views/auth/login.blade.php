@extends('layouts.app')

@section('title', 'Login')

@section('navbar')
    <x-navbar />
@endsection

@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:90vh;">
    <div class="p-4 border rounded shadow-sm" style="width: 400px; background: white;">
        
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <h3 class="text-center mb-4">Login</h3>

            <div class="mb-3">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control" id="name" name="name" required>
                @error('name')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')
                    <p class="text-danger small">{{ $message }}</p>
                @enderror
            </div>

            @error('credentials')
                <p class="text-danger small">{{ $message }}</p>
            @enderror

            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('register.page') }}">Create account?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

    </div>
</div>
@endsection
