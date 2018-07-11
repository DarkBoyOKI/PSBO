<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Jadwal;
use App\Matkul;

class JadwalController extends Controller
{
    //
    public function buatJadwal($id_matkul,$semester){
        $matkul = Matkul::where('id','=', $id_matkul)->first();
        //if(Jadwal::where([['id_mhs','=',Auth::user()->id],['id_matkul','=',$id_matkul],['semester','=',Auth::user()->semester]]))
        //    return back()->with('danger', 'Mata kuliah telah diambil!');
        Jadwal::create([
            'id_mhs' => Auth::user()->id,
            'id_matkul' => $id_matkul,
            'semester' => $semester,
            'sks' => $matkul->sks,
        ]);
        return back()->with('success', 'Mata kuliah telah ditambahkan');
    }
    //
    public function hapusJadwal($id_jadwal){
        $jadwal = Jadwal::where('id','=', $id_jadwal)->first();
        $jadwal->delete();
        return back()->with('success', 'Mata kuliah telah dihapus');
    }
}
