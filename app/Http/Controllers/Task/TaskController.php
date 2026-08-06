<?php

namespace App\Http\Controllers\Task;

use App\Business\Task\CreateTaskBusiness;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;

class TaskController extends Controller
{/**
     * Show the form to create a new task.
     */
    public function create()
    {
        return view('task.new_task');
    }

    /**
     * submit a new task.
     */

    public function store(CreateTaskRequest $request ,CreateTaskBusiness $business)
    {
        $business->handle($request->validated());
        return redirect('/login')->with('success', 'Task registered successfully!');
    }
}
