<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        return view("new_entry");
    }

    public function save(Request $request)
    {
        $message = $request->input("message");
        echo "message : " . $message;
    }

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

    // public function create()
    // {
        // echo "<BR>create";
    // }

    // public function store(Request $request)
    // {
        // echo "<BR>store";
    // }

    // public function show($id)
    // {
        // echo "<BR>show : " . $id;
    // }

    // public function edit($id)
    // {
        // echo "<BR>edit : " . $id;
    // }

    // public function update(Request $request, $id)
    // {
        // $pattern = $request->is("note/*");
        // if ($pattern) {
            // echo "<BR>update : " . $id;
        // }
        // else {
            // echo "<BR>Cannot update : " . $id;
        // }
    // }

    // public function destroy($id)
    // {
        // echo "<BR>destroy : " . $id;
    // }
}
