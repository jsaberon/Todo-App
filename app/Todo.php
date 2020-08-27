<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $casts = [
      'done' => 'datetime',
      'deadline' => 'datetime',
    ];

    public function project() {
      return $this->belongsTo(Project::class);
    }
}
