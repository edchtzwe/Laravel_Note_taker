<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MiddlewareControllerPackOne extends Controller
{
    public function index()
    {
        echo "<BR>Middleware Controller Pack One";
    }
}
