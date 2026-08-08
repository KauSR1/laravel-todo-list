<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['user_id', 'title', 'description', 'priority', 'date_limited'])]

class Task extends Model
{
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityLabelAttribute()
    {
        return match($this->priority) {
            0 => 'Pending',
            1 => 'Overdue',
            2 => 'Complete',
            default => 'Pending',
        };
    }

}
