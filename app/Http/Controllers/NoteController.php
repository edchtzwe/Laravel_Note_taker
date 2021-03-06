<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Notes;

class NoteController extends Controller
{
    public function index()
    {
        return view("new_entry", ["title" => "Note Taker App"]);
    }

    public function CreateRecord(Request $request)
    {
        $message = $request->input("message");
        $title   = $request->input("title");

        // DB::insert("insert into notes (message, author) values (?, ?)", [$message, "admin"]);

        $record = new Notes;

        $record->title   = $title;
        $record->Message = $message;
        $record->Author  = "Admin";

        $record->save();

        return redirect()->route("get_note", $record->id);
    }

    public function SaveEdit(Request $request)
    {
        $id      = $request->input("note_id");
        $title   = $request->input("title");
        $message = $request->input("message");

        // DB::update("update notes set Message = ? where id = ?", [$message, $id]);

        $noteObj = Notes::find($id);

        $noteObj->title   = $title;
        $noteObj->Message = $message;

        $noteObj->save();

        return redirect()->route("list_notes");
    }

    public function GetAll()
    {
        // $allRecords = DB::select("select * from notes");
        // $allRecords = DB::table("notes")->get();

        $allRecords = Notes::get();

        return view("list_notes", ["notes" => $allRecords]);
    }

    public function Get($id)
    {
        // $record = DB::select("select * from notes where id = ?", [$id]);
        // $record = $record[0];
        // $record = DB::table("notes")->where("id", $id)->first();
        // ->value(<row_name>) to return the value of a column
        // $record = DB::table("notes")->find($id);

        $record = Notes::find($id);

        $id      = $record->id;
        $title   = $record->title;
        $message = $record->Message;

        return view("view_entry", [
            "id"    => $id,
            "title" => $title,
            "note"  => $message,
        ]);
    }

    public function DeleteRecord($id)
    {
        // DB::delete("delete from notes where id = ?", [$id]);

        $record = Notes::find($id);

        $record->delete();

        return $this->GetAll();
    }

    public function EditRecord($id)
    {
        $record = DB::table("notes")->find($id);

        $id      = $record->id;
        $title   = $record->title;
        $message = $record->Message;

        return view("edit_entry", [
            "id"    => $id,
            "title" => $title,
            "note"  => $message,
        ]);
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
        // DB::table("notes")->whereNotNull("Message")
            // ->chunkById(100, function($notes) {
                // foreach ($notes as $note) {
                    // DB::table("notes")
                        // ->where("id", $note->id)
                        // ->update(["Message" => ""]);
                // }
            // });

        Notes::whereNotNull("Message")
            ->update(["Message" => ""]);
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
