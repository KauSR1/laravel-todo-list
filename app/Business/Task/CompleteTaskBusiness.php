<?php

namespace App\Business\Task;

use App\Models\Task;

class CompleteTaskBusiness
{
    /**
     * Handle the update of an existing task.
     */
    public function handle($id)
    {
        $task = Task::find($id);
        if (!$task) {
            return false;
        }

        $task->update([
            'completed_at' => now(),
            'priority' => 2
        ]);

        return true;
    }
}
