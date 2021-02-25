<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index()
    {
        echo "<BR>index";
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
        echo "<BR>update : " . $id;
    }

    public function destroy($id)
    {
        echo "<BR>destroy : " . $id;
    }
}
