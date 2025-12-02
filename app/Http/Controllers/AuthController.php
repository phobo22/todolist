<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Task;

class AuthController extends Controller
{
    public function index(Request $request) {
        $query = Task::query();

        if ($request->searchTitle) {
            $query->title($request->searchTitle);
        }

        $categories = (array) $request->input('filterCategory');
        $status = (array) $request->input('filterStatus');

        if (!empty($categories)) {
            $query->category($categories);
        }

        if (!empty($status)) {
            $query->status($status);
        }

        $tasks = $query->paginate(9);

        return view("home.dashboard", [
            'tasks' => $tasks,
            'categories' => empty($categories) ? null : $categories,
            'status' => empty($status) ? null : $status,
            'searchTitle' => $request->searchTitle,
        ]);
    }
    
    public function register() {
        return view("auth.register");
    }

    public function login() {
        return view("auth.login");
    }

    public function handleRegister(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8', 
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function handleLogin(Request $request) {
        $credentials = $request->validate([
            'name' => 'required|string',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return back()
            ->withErrors(['credentials' => "Incorrect username or password"])
            ->onlyInput('username');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}