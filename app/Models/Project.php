<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = array('id');

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
