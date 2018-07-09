<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable = [
        'name',
        'project_id',
        'user_id',
        'days',
        'hours',
        'jadwal_id'
    ];


    public function user(){
		return $this->belongsTo('App\User');
    }

    public function project(){
		return $this->belongsTo('App\Project');
    }

    public function jadwal(){
		return $this->belongsTo('App\Jadwal');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}

