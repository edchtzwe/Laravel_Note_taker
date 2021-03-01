<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function GetAll()
    {
        foreach (Type::all() as $type) {
            
        }
    }

    public function GetByType($type)
    {
        $types = Type::where()
    }
}
