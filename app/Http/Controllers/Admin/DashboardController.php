<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $response = [];

        $response['users_count'] = count(Users::all());

        return view('pages.admin.dashboard', $response);
    }
}
