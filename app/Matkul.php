<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'jadwal_id',
        'user_id',
        'days',

    ];


    public function users(){
		return $this->belongsToMany('App\User');
    }

    

    public function jadwal(){
		return $this->belongsTo('App\Jadwal');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

}
