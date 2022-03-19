<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

$namespace = '\App\Http\Controllers\Api\\';

Route::resource('student',$namespace.'StudentController')->only([
    'index','store'
]);

Route::post('student/update',$namespace.'StudentController@update');
Route::post('student/delete',$namespace.'StudentController@destroy');
