<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivateAccountController extends Controller
{
    public function index()
    {
        $response = [];
        $response['user'] = session()->get('user');

        return view('pages.activate-account', $response);
    }
}
