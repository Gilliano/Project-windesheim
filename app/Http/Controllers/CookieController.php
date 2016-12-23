<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    // Create a cookie
    public function store(Request $request)
    {
//        $response = new Response();
//        $response->withCookie(cookie()->forever($request->input('name'), $request->input('value')));
//        return $response;
        Cookie::queue(cookie()->forever($request->input('name'), $request->input('value')));
    }

    // Return a cookie by name
    public function show(Request $request, $cookie_name)
    {
        return $request->cookie($cookie_name);
    }

    // Delete a cookie by name
    public function destroy($cookie_name)
    {
        Cookie::queue(Cookie::forget($cookie_name));
    }
}
