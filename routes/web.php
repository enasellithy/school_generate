<?php

use Illuminate\Support\Facades\Route;

$namespace = '\App\Http\Controllers\\';

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => $namespace.'Admin', 'prefix' => 'admin'],function () use ($namespace){
    Route::get('login','AuthController@login');
    Route::post('login','AuthController@login_post');
    Route::group(['middleware' => 'admin', 'namespace' => $namespace.'Admin'],function() {
        Route::get('/','DashboardController@index');
        Route::get('/logout','AuthController@logout');
        Route::resource('school','SchoolController')->except('show');
        Route::resource('student','StudentController')->except('show');
    });
});


