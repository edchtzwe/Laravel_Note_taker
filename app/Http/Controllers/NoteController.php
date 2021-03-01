<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
// DB facade
use DB;

class NoteController extends Controller
{
    public function index()
    {
        return view("new_entry", ["title" => "Note Taker App"]);
    }

    // start DB methods
    public function save(Request $request)
    {
        $message = $request->input("message");
        DB::insert("insert into notes (message, author) values (?, ?)", [$message, "admin"]);
        return redirect()->route("home");
    }

    public function SaveEdit(Request $request)
    {
        $message = $request->input("message");
        $id = $request->input("note_id");
        DB::update("update notes set Message = ? where id = ?", [$message, $id]);
        return redirect()->route("list_notes");
    }

    public function GetAll()
    {
        $allRecords = DB::select("select * from notes");
        return view("list_notes", ["notes" => $allRecords]);
    }

    public function Get($id)
    {
        $record = DB::select("select * from notes where id = ?", [$id]);
        // echo var_dump($record[0]->Message);
        $record = $record[0];
        // echo $record->Message;
        $message = $record->Message;
        $id = $record->id;
        return view("view_entry", ["note" => $message, "id" => $id]);
    }

    public function EditRecord($id)
    {
        $record = DB::select("select * from notes where id = ?", [$id]);
        // echo var_dump($record[0]->Message);
        $record = $record[0];
        $message = $record->Message;
        $id = $record->id;
        return view("edit_entry", ["note" => $message, "id" => $id]);
    }

    // end DB methods

    public function setCookie(Request $request)
    {
        $minutes = 3;
        $response = new Response("Set Cookie Response");
        $response->withCookie(cookie("NoteControllerCookie", "Y", $minutes));
        $response->withCookie(cookie()->forever("CookieAcceptance", "Y"));

        return $response;
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie("NoteControllerCookie");
        echo "The value of the cookie 'NoteControllerCookie' is : " . $value;
        $value = $request->cookie("CookieAcceptance");
        echo "<BR>and the value of the immortal 'CookieAcceptance' cookie is : " . $value;
    }

}
