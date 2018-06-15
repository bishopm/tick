<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = array('id');

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }
}
