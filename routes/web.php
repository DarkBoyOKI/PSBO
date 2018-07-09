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

    // Authentication Routes...
Route::get('admin/home', 'AdminController@index');
    $this->get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
    $this->post('admin', 'Admin\LoginController@login');
    $this->post('logout', 'Admin\LoginController@logout')->name('logout');

    // Registration Routes...
    //$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    //$this->post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    $this->get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    $this->post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    $this->get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    $this->post('admin-password/reset', 'Admin\ResetPasswordController@reset');


Route::middleware(['auth'])->group(function (){
    Route::resource('jadwals', 'JadwalsController');
    Route::get('projects/create/{jadwal_id?}', 'ProjectsController@create');
    Route::post('/projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
    Route::resource('projects', 'ProjectsController');
        
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('comments', 'CommentsController');
});