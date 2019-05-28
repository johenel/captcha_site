<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class UsersController extends Controller
{
    public function typeCaptchaIndex(Request $request)
    {
        $response = [];

        $response['total_captcha'] = 0;
        $response['total_earnings'] = 0;
        $response['today_captcha'] = 0;
        $response['today_earnings'] = 0;

        return view('pages.users.type-captcha', $response);
    }

    private function getTotalCaptcha()
    {

    }

    public function typeCaptcha(Request $request)
    {
        $input = $request->captcha_user_input;

        if($input == 'test123') {
            $transaction = new Transactions();
            $transaction->users_id = $request->session()->get('user')->id;
            $transaction->type_id = 1;
            $transaction->status_id = 3;
            $transaction->value = 0.3;
            $transaction->save();

            $request->session()->flash('success',true);
        } else {
            $request->session()->flash('success',false);
        }

        return redirect('/typing-captcha');
    }
}
