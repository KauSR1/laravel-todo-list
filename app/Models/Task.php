<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'title', 'description', 'priority', 'date_limited'])]

class Task extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityLabelAttribute()
    {
        return match($this->priority) {
            0 => 'Normal',
            1 => 'Medium',
            2 => 'High',
            default => 'Normal',
        };
    }

}
