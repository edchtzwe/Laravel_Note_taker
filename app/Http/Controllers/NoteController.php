<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        return view("new_entry");
    }

    public function create()
    {
        echo "<BR>create";
    }

    public function store(Request $request)
    {
        echo "<BR>store";
    }

    public function show($id)
    {
        echo "<BR>show : " . $id;
    }

    public function edit($id)
    {
        echo "<BR>edit : " . $id;
    }

    public function update(Request $request, $id)
    {
        $pattern = $request->is("note/*");
        if ($pattern) {
            echo "<BR>update : " . $id;
        }
        else {
            echo "<BR>Cannot update : " . $id;
        }
    }

    public function destroy($id)
    {
        echo "<BR>destroy : " . $id;
    }

    public function save(Request $request)
    {
        $message = $request->input("message");
        echo "message : " . $message;
    }
}
