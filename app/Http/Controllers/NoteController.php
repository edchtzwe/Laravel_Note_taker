<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    public function index()
    {
        return view("new_entry", ["title" => "Note Taker App"]);
    }

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
        // $allRecords = DB::select("select * from notes");
        $allRecords = DB::table("notes")->get();
        return view("list_notes", ["notes" => $allRecords]);
    }

    public function Get($id)
    {
        // $record = DB::select("select * from notes where id = ?", [$id]);
        // $record = $record[0];
        // $record = DB::table("notes")->where("id", $id)->first();
        // ->value(<row_name>) to return the value of a column
        $record = DB::table("notes")->find($id);
        $message = $record->Message;
        $id = $record->id;
        return view("view_entry", ["note" => $message, "id" => $id]);
    }

    public function DeleteRecord($id)
    {
        DB::delete("delete from notes where id = ?", [$id]);
        return $this->GetAll();
    }

    public function EditRecord($id)
    {
        $record = DB::table("notes")->find($id);
        $message = $record->Message;
        $id = $record->id;
        return view("edit_entry", ["note" => $message, "id" => $id]);
    }

    public function GetNoteMessagesOnly()
    {
        $messages = DB::table("notes")->pluck("Message");

        foreach ($messages as $message) {
            echo $message;
            echo "<BR>";
        }
    }

    public function ClearAllNoteMessage()
    {
        DB::table("notes")->whereNotNull("Message")
            ->chunkById(100, function($notes) {
                foreach ($notes as $note) {
                    DB::table("notes")
                        ->where("id", $note->id)
                        ->update(["Message" => ""]);
                }
            });
    }

    public function setCookie(Request $request)
    {
        $minutes = 3;
        $response = new Response("Set Cookie Response");
        $response->withCookie(cookie("NoteControllerCookie", "Y", $minutes));
        $response->withCookie(cookie()->forever("CookieAcceptance", "Y"));

        return $response;
    }

    public function RecordExists($id)
    {
        return DB::table("notes")->find($id)->exists();
    }

    public function getCookie(Request $request)
    {
        $value = $request->cookie("NoteControllerCookie");
        echo "The value of the cookie 'NoteControllerCookie' is : " . $value;
        $value = $request->cookie("CookieAcceptance");
        echo "<BR>and the value of the immortal 'CookieAcceptance' cookie is : " . $value;
    }

}
