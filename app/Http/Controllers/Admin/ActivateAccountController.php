<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\ActivationRequestDetails;

class ActivateAccountController extends Controller
{

    public function index(Request $request, $id)
    {
        $response         = [];
        $response['user'] = Users::find($id);
        $response['apd']  = ActivationRequestDetails::where('users_id', $id)->get();

        return view('pages.admin.activate-account', $response);
    }

    public function apdRequestAction(Request $request)
    {
        switch ($request->action) {
            case 3:
                Users::where('id', $request->uid)->update([
                    'is_activated' => 1
                ]);
                break;
        }

        ActivationRequestDetails::where('users_id', $request->uid)->where('id', $request->apdid)
            ->update([
                'is_accepted' => $request->action
            ]);

        return redirect('/activation-request/' . $request->uid);
    }
}
