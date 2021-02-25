<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('MiddlewarePackOne');
    }

    public function ShowProfile(Request $request)
    {
        echo "Show Profile Proto";
    }

    public function ShowPath(Request $request)
    {
        $uri = $request->path();
        echo "<BR>URI : ".$uri;

        $url = $request->url();
        echo "<BR>URL : ".$url;

        $method = $request->method();
        echo "<BR>Method : ".$method;
    }
}
