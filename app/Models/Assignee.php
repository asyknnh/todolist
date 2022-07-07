<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignee extends Model
{
    use HasFactory;

    protected $fillable = [
        'assign_to', 'task_id'
    ];

    // one assignee belongs to one task
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
