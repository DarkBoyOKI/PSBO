<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ApproveController extends Controller
{
    
    //
    public function approveJadwal(){
        $user = User::where('id','=', $id)->first();
        $user->approve = 1;
        $user->save();
    }

    public function disapproveJadwal(){
        $user = User::where('id','=', $id)->first();
        $user->approve = 2;
        $user->save();
    }
}
