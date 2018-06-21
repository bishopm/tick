<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $guarded = array('id');

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    public function tasks()
    {
        return $this->belongsToMany('App\Models\Task');
    }

    public function activetasks()
    {
        $today = date('Y-m-d');
        return $this->belongsToMany('App\Models\Task')->where('priority', '<=', $today)->where('done', 'no');
    }

    public function activeprojects()
    {
        return $this->belongsToMany('App\Models\Project')->where('inactive', '=', 'no');
    }

    public function inactiveprojects()
    {
        return $this->belongsToMany('App\Models\Project')->where('inactive', '=', 'yes');
    }
}
