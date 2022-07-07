<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'attachment', 'task_id'
    ];

    // one attachment belongs to one task
    public function task()
    {
        return $this->belongsTo('App\Models\Task');
    }
}
