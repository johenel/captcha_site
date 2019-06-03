<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;

class UsersController extends Controller
{

    protected $user;

    public function __construct(Request $request)
    {
        $this->user = session()->get('user');
    }

    public function typeCaptchaIndex(Request $request)
    {
        $response = [];

        $response['total_captcha']  = $this->getTotalCaptcha();
        $response['total_earnings'] = $this->getTotalEarnings();
        $response['today_captcha']  = $this->getTodaysCaptcha();
        $response['today_earnings'] = $this->getTodaysEarning();

        return view('pages.users.type-captcha', $response);
    }

    public function referralsIndex(Request $request)
    {
        $response = [];
        $response['referrals'] = [];
        return view('pages.users.referral-list', $response);
    }

    private function getTodaysCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)
            ->where('type_id', 1)
            ->where('status_id', 3)
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d'). '%')
            ->count();
    }

    private function getTodaysEarning()
    {
        $total = 0;

        $result = Transactions::where('users_id', session()->get('user')->id)
            ->whereIn('type_id', [1, 3])
            ->where('status_id', 3)
            ->select(DB::raw('sum(value) as total'))
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d'). '%')
            ->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    private function getTotalCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)->where('type_id', 1)->where('status_id', 3)->count();
    }

    private function getTotalEarnings()
    {
        $total = 0;

        $result = Transactions::where('users_id', session()->get('user')->id)
            ->whereIn('type_id', [1, 3])
            ->where('status_id', 3)
            ->select(DB::raw('sum(value) as total'))
            ->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function typeCaptcha(Request $request)
    {
        $input = $request->captcha_user_input;

        if ($input == 'test123') {
            $transaction            = new Transactions();
            $transaction->users_id  = $request->session()->get('user')->id;
            $transaction->type_id   = 1;
            $transaction->status_id = 3;
            $transaction->value     = 0.03;
            $transaction->save();

            $request->session()->flash('success', true);
        } else {
            $request->session()->flash('success', false);
        }

        return redirect('/typing-captcha');
    }

    public function encashmentIndex(Request $request)
    {
        return view('pages.users.encashment');
    }
}
