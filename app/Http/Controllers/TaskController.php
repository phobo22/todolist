<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Jobs\ConfirmAddedTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = $user->tasks();

        if ($request->searchTitle) {
            $query->title($request->searchTitle);
        }
        
        $categories = (array) $request->input('filterCategory', []);
        $status = (array) $request->input('filterStatus', []);

        if (!empty($categories)) {
            $query->category($categories);
        }

        if (!empty($status)) {
            $query->status($status);
        }

        $tasks = $query->paginate(9);

        return view("task.index", [
            'tasks' => $tasks,
            'categories' => empty($categories) ? null : $categories,
            'status' => empty($status) ? null : $status,
            'searchTitle' => $request->searchTitle,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect()->guest(route('login'));
        }

        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'category' => 'required|in:cat1,cat2,cat3',
            'deadline' => 'required|date',
            'status' => 'required|in:0,1,2',
        ]);

        $task = new Task($validated);
        $task->user_id = Auth::id();
        $task->save();

        //ConfirmAddedTask::dispatch($task);

        return redirect($request->input('redirect_to'))->with('msg', "Add task successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view("task.edit", ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'nullable|string',
            'category' => 'required|in:cat1,cat2,cat3',
            'deadline' => 'date',
            'status' => 'required|in:0,1,2',
        ]);

        $task->update($validated);
        return redirect($request->input('redirect_to'))->with('msg', 'Update task successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $task)
    {
        $task->delete();
        return redirect($request->input('redirect_to'))->with('msg', 'Delete task successfully!!');
    }
}
