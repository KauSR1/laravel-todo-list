<?php

namespace App\Business\Task;

use App\Models\Task;

class CreateTaskBusiness
{
    /**
     * Execute a register from task
     */
    public function handle(array $data): Task
    {
        return Task::create([
            'user_id' => auth()->user()->id,
            'title' => $data['text_title'],
            'description' => $data['text_note'],
            'date_limited' => $data['date_limited'] ?? null,
        ]);
    }
}
