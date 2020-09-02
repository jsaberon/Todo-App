<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $casts = [
      'done' => 'datetime',
      'deadline' => 'datetime',
    ];

    public function todo() {
      return $this->belongsTo(Todo::class);
    }
}
