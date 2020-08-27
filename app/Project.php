<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
      'deadline' => 'datetime',
    ];
    
    public function todos() {
      return $this->hasMany(Todo::class);
    }

    public function user() {
      return $this->belongsTo(User::class);
    }
}
