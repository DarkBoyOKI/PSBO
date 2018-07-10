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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//->middleware('auth');


Route::middleware(['auth'])->group(function () {

    Route::resource('jadwals', 'JadwalsController');

    Route::get('matkuls/create/{jadwal_id?}', 'MatkulsController@create');
    Route::post('/matkuls/adduser', 'MatkulsController@adduser')->name('matkuls.adduser');
    Route::resource('matkuls', 'MatkulsController');
    
    Route::resource('roles', 'RolesController');
    Route::resource('tasks', 'TasksController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');

    
});

