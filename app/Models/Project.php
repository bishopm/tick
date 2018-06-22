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

    public function activetasks()
    {
        $today = date('Y-m-d');
        return $this->hasMany('App\Models\Task')->where('priority', '<=', $today)->where('done', 'no');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
