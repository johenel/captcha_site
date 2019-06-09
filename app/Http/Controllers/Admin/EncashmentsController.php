<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EncashmentsController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.admin.encashments');
    }
}
