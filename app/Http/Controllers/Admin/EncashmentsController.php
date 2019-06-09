<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Encashments;

class EncashmentsController extends Controller
{
    public function index(Request $request)
    {

        $response = [];
        $response['users'] = Users::where('is_activated', Users::ACTIVATED)->where('account_type', Users::TYPE_USERS)
            ->has('encashments')
            ->with(['encashments' => function($q) {
                $q->where('status', Encashments::STATUS_PENDING);
            }])
            ->get();

        return view('pages.admin.encashments', $response);
    }
}
