<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable = [
        'step', 'task_id'
    ];

    // one step belongs to one task
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
