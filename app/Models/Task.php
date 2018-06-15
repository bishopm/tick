<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = array('id');

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
