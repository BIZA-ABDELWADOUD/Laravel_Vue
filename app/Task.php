<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'name'
    ];

    public function scopeOrder($query){
        return $query->orderBy('created_at','desc');
    }
}
