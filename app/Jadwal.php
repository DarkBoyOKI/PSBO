<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $fillable = [
        'id_mhs', 'id_matkul', 'sks', 'semester', 'approve',
    ];
}
