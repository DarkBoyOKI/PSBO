<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ApproveController extends Controller
{
    
    //
    public function approveJadwal($id){
        $accept=User::where('id',$id)->update(['approve'=>1]);
        return back()->with('alert','Jadwal telah diapprove.');
    }

    public function disapproveJadwal($id){
        $accept=User::where('id',$id)->update(['approve'=>2]);
        return back()->with('alert','Jadwal telah ditolak.');
    }
}
