<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'my_day', 'reminder', 'due_date', 'repeat', 'note', 'important', 'completed', 'to_do_id'
    ];

    // one task belongs to one todo
    public function toDo()
    {
        return $this->belongsTo('App\Models\ToDo');
    }

    // one task has many steps
    public function steps()
    {
        return $this->hasMany('App\Models\Step');
    }

    // one task has many files
    public function attachments()
    {
        return $this->hasMany('App\Models\Attachment');
    }

    // one task has many assignees
    public function assignees()
    {
        return $this->hasMany('App\Models\Assignee');
    }
}
