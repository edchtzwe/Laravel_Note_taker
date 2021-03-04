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

Route::get('/', ["as" => "home", function () {
    return view('welcome', ["heading" => "Note Taker App Landing Page"]);
}]);

Route::get("/home", function() {
    return redirect()->route("home");
});

Route::post("/note/save", [
    "uses" => "NoteController@CreateRecord",
]);
Route::post("/note/save_edit", [
    "uses" => "NoteController@SaveEdit"
]);

Route::get("/note", [
    "as"   => "create_new",
    "uses" => "NoteController@index"
]);
Route::get("/note/set_cookie", [
    "uses" => "NoteController@setCookie"
]);
Route::get("/note/get_cookie", [
    "uses" => "NoteController@getCookie"
]);

Route::get("/set_default_cookies", function() {
    return response("Theme : Dark", 200)->header("Content-Type", "text/html")->withcookie("theme", "dark");
});

Route::get("get_settings_as_json", function() {
    return response()->json([
        "autosave"    => "Y",
        "expire_days" => "7",
    ]);
});

Route::get("/get_all_notes", [
    "as"   => "list_notes",
    "uses" => "NoteController@GetAll"
]);

Route::get("/get_note/id/{id}", [
    "as"    => "get_note",
    "uses" => "NoteController@Get"
]);

Route::get("/edit_note/id/{id}", [
    "as"    => "edit_note",
    "uses" => "NoteController@EditRecord"
]);

Route::get("/delete_note/id/{id}", [
    "as"    => "delete_note",
    "uses" => "NoteController@DeleteRecord"
]);

Route::get("/redirect_new_note", function() {
    return redirect()->action("NoteController@index");
});































// Route::resource("note", "NoteController");
// Route::get('/note/', function() {
    // return view("new_entry");
// });

// Route::get('PackOne', [
    // "middleware" => "MiddlewarePackOne:editor",
    // "uses" => "MiddlewareControllerPackOne@index"
// ]);

// Route::get('Terminate', [
    // "middleware" => "TerminateMiddleware:editor",
    // "uses" => "TerminateMiddlewareController@index"
// ]);

// Route::get('Profile', [
    // "middleware" => "auth",
    // "uses" => "UserController@ShowProfile"
// ]);

// Route::get('/user_controller/path', [
    // "middleware" => "MiddlewarePackOne",
    // "uses" => "UserController@ShowPath"
// ]);
