<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    //
    protected $fillable = [
        'name', 'code', 'sks', 'description',
    ];
}
