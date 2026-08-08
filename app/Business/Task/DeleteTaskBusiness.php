<?php

namespace App\Business\Task;

use App\Models\Task;

class DeleteTaskBusiness
{
    public function handle($id): bool
    {
        $task = Task::find($id);

        if (!$task) {
            return false;
        }

        return $task->delete();
    }
}
