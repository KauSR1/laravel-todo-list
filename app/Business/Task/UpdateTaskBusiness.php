<?php

namespace App\Business\Task;

use App\Models\Task;

class UpdateTaskBusiness
{
    /**
     * Handle the update of an existing task.
     */
    public function handle($id, array $data): bool
    {
        $task = Task::find($id);
        if (!$task) {
            return false;
        }

        return $task->update([
            'title'        => $data['text_title'],
            'description'  => $data['text_note'],
            'date_limited' => $data['date_limited'] ?? null,
        ]);
    }
}
