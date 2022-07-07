<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    protected $fillable = [
        'list_name', 'user_id'
    ];

    // one todo belongs to one user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // one todo has many tasks
    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
