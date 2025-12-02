<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Test;
use App\Http\Controllers\Sequence;

class HomeController extends Controller
{
    public function index() {
        return Task::factory()->create();
    }
}
