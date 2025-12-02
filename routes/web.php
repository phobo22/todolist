<?php

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/weather', function () {
    $locationResponse = Http::get('http://api.openweathermap.org/geo/1.0/direct', [
        'q' => 'london',
        'appid' => 'c65b6eecd8dc5cc049c51d7021659cf8',
    ]);

    $locationData = $locationResponse->json()[0];

    $locations = [
        'lon' => $locationData['lon'],
        'lat' => $locationData['lat'],
    ];

    $weatherResponse = Http::get('https://api.openweathermap.org/data/2.5/weather', [
        'lat' => $locations['lat'],
        'lon' => $locations['lon'],
        'appid' => 'c65b6eecd8dc5cc049c51d7021659cf8',
    ]);

    return $weatherResponse->json();
});

// Route::get('/', [HomeController::class, "index"])->name("home")->middleware('guest');

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name("home");

    Route::get('/register', 'register')
        ->middleware('guest')
        ->name('register.page');

    Route::post('/register', 'handleRegister')
        ->middleware('guest')
        ->name('register.submit');

    Route::get('/login', 'login')
        ->middleware('guest')
        ->name('login');

    Route::post('/login', 'handleLogin')
        ->middleware('guest')
        ->name('login.submit');

    Route::post('/logout', 'logout')
        ->middleware('auth')
        ->name('logout');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/tasks', 'index')
        ->middleware('auth')
        ->name('tasks.index');

    Route::get('/tasks/create', 'create')
        ->middleware('auth')
        ->name('tasks.create');

    Route::post('/tasks', 'store')
        ->middleware('auth')
        ->name('tasks.store');

    Route::get('/tasks/{task}', 'show')->name('tasks.show');

    Route::get('/tasks/{task}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'task')
        ->name('tasks.edit');

    Route::put('/tasks/{task}', 'update')
        ->middleware('auth')
        ->can('edit', 'task')
        ->name('tasks.update');

    Route::delete('/tasks/{task}', 'destroy')
        ->middleware('auth')
        ->can('edit', 'task')
        ->name('tasks.destroy');
});

