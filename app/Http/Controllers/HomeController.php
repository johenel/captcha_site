<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            return view('pages.home');
        }

        $response = [];
        $response['action'] = $request->action;

        return view('welcome', $response);
    }
}
