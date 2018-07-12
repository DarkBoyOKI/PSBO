<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('/templates/login');});
Route::get('/home', function () {
    if(!Auth::user())
        return redirect('login');
    $user=Auth::user();
    if($user->role!='mahasiswa')
        return redirect('jadwalMHS');
    return view('templates/index');
});

Route::get('/buatJadwal/{id_matkul}/{semester}', 'JadwalController@buatJadwal')->name('makeJadwal');
Route::get('/hapusJadwal/{id_jadwal}', 'JadwalController@hapusJadwal')->name('hapusJadwal');

Route::get('/login', function () {
    return view('templates/login');
});

Route::get('/register', function () {
    return view('templates/register');
});


Route::get('/matkul', function () {
    return view('templates/matkul');
});


Route::get('/buatJadwal', function () {
    if(!Auth::user())
        return redirect('login');
    $user=Auth::user();
    if($user->role!='mahasiswa')
        return redirect('/home');
    return view('templates/buatJadwal');
});

Route::get('/buatMatkul', function () {
    if(!Auth::user())
        return redirect('login');
    $user=Auth::user();
    if($user->role!='dosen')
        return redirect('/home');
    return view('templates/buatMatkul');
});

Route::get('/jadwalMHS', function () {
    if(!Auth::user())
        return redirect('login');
    $user=Auth::user();
    if($user->role!='dosen')
        return redirect('home');
    return view('templates/jadwalMHS');
});

Route::get('/jadwalMHS/{id_mhs}', function ($id_mhs) {
    if(!Auth::user())
        return redirect('login');
    $user=Auth::user();
    if($user->role!='dosen')
        return redirect('home');
    return view('templates/jadwalMHSdetail',compact('id_mhs'));
});

Route::post('/buatMatkul', 'MatkulController@buatMatkul')->name('buatMatkul');


Route::post('/approveJadwal/{id}', 'ApproveController@approveJadwal')->name('approveJadwal');
Route::post('/disapproveJadwal/{id}', 'ApproveController@disapproveJadwal')->name('disapproveJadwal');


Auth::routes();

