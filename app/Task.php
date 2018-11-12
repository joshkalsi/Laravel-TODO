<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'due_at', 'completed'];
    protected $casts = [
        'due_at' => 'date'
    ];
}
