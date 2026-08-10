<?php

namespace App\Http\Controllers\Task;

use App\Business\Task\CompleteTaskBusiness;
use App\Business\Task\CreateTaskBusiness;
use App\Business\Task\UpdateTaskBusiness;
use App\Business\Task\DeleteTaskBusiness;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\CreateTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Services\Decrypt;

class TaskController extends Controller
{
    /**
     * Show the form to create a new task.
     */
    public function create()
    {
        return view('task.new_task');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(CreateTaskRequest $request, CreateTaskBusiness $business)
    {
        $business->handle($request->validated());
        return redirect('/')->with('success', 'Task registered successfully!');
    }

    /**
     * Show the form to edit the specified task.
     */
    public function edit($id)
    {
        $decryptedId = Decrypt::decryptId($id);
        $task = \App\Models\Task::find($decryptedId);

        if (!$task) {
            return redirect('/')->with('error', 'Task not found.');
        }

        return view('task.edit_task', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(UpdateTaskRequest $request, UpdateTaskBusiness $business)
    {
        $id = Decrypt::decryptId($request->task_id);

        $updated = $business->handle($id, $request->validated());

        if (!$updated) {
            return redirect()->back()->with('error', 'Task not found or could not be updated.');
        }
        return redirect('/')->with('success', 'Task updated successfully!');
    }

    /**
     * Show the confirmation form to delete the specified task.
     */
    public function confirmDelete($id)
    {
        $decryptedId = Decrypt::decryptId($id);
        $task = \App\Models\Task::find($decryptedId);

        if (!$task) {
            return redirect('/')->with('error', 'Task not found.');
        }

        return view('task.delete_task', compact('task'));
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy($id, DeleteTaskBusiness $business)
    {
        $decryptedId = Decrypt::decryptId($id);
        $deleted = $business->handle($decryptedId);

        if (!$deleted) {
            return redirect()->route('home')->with('error', 'Task not found or could not be deleted.');
        }

        return redirect()->route('home')->with('success', 'Task deleted successfully!');
    }

    /**
     * Complete the specified task.
     */

    public function complete($id, completeTaskBusiness $business)
    {
        $decryptedId = Decrypt::decryptId($id);
        $completed = $business->handle($decryptedId);

        if (!$completed) {
            return redirect()->back()->with('error', 'Task not found or could not be completed.');
        }

        return redirect()->back()->with('success', 'Task marked as completed!');
    }
}
