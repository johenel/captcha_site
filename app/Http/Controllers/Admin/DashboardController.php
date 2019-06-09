<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Transactions;
use DB;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $response = [];

        $response['users_pending']     = Users::where('is_activated', Users::PENDING)->count();
        $response['users_activated']   = Users::where('is_activated', Users::ACTIVATED)->count();
        $response['users_deactivated'] = Users::where('is_activated', Users::DEACTIVATED)->count();
        $response['users_income']      = count($total = Transactions::where('status_id', Transactions::STATUS_COMPLETED)->select(DB::raw('sum(value) as total'))->get()) > 0 ? $total : null;

        return view('pages.admin.dashboard', $response);
    }
}
