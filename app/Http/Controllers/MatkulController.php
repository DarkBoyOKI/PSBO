<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Matkul;

class MatkulController extends Controller
{
    //
    public function buatMatkul(Request $request){
        Matkul::create([
            'name' => $request->name,
            'code' => $request->code,
            'description' => $request->description,
            'sks' => $request->sks,
        ]);
        return back()->with('success', 'Mata kuliah telah ditambahkan');
    }
}
