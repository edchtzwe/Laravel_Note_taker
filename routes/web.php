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

Route::get('PackOne', [
    "middleware" => "MiddlewarePackOne:editor",
    "uses" => "MiddlewareControllerPackOne@index"
]);

Route::get('Terminate', [
    "middleware" => "TerminateMiddleware:editor",
    "uses" => "TerminateMiddlewareController@index"
]);

Route::get('Profile', [
    "middleware" => "auth",
    "uses" => "UserController@ShowProfile"
]);

Route::get('/user_controller/path', [
    "middleware" => "MiddlewarePackOne",
    "uses" => "UserController@ShowPath"
]);

Route::resource("note", "NoteController");