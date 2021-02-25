<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TerminateMiddlewareController extends Controller
{
    public function index()
    {
        echo "<BR>Terminate Middleware Controller";
    }
}
