<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatkulUser extends Model
{
    //
    protected $table = "matkul_user";

    protected $fillable = [
        'matkul_id',
        'user_id',

    ];
    

}
