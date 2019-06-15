<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;
use App\Models\Encashments;
use App\Models\Users;
use App\Models\Rewards;

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

        $usersModel = new Users;

        $response['total_captcha']  = $usersModel->getTotalCaptcha();
        $response['total_earnings'] = $usersModel->getTotalIncome();
        $response['today_captcha']  = $usersModel->getTodaysCaptcha();
        $response['today_earnings'] = $usersModel->getTodaysEarning();

        return view('pages.users.type-captcha', $response);
    }

    public function referralsIndex(Request $request)
    {
        $response              = [];
        $response['referrals'] = [];
        return view('pages.users.referral-list', $response);
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

    public function encashGcashIndex(Request $request)
    {
        return view('pages.payment-forms.gcash');
    }

    public function encashPalawanIndex(Request $request)
    {
        return view('pages.payment-forms.palawan');
    }

    public function encashCoinsphIndex(Request $request)
    {
        return view('pages.payment-forms.coinsph');
    }

    public function encashMlhuillierIndex(Request $request)
    {
        return view('pages.payment-forms.mlhuillier');
    }

    public function encash(Request $request)
    {
        $this->validate($request,
            [
                'amount' => 'integer|min:300'
            ],
            [
                'amount.min' => 'The minimum required amount is 300.00 PHP'
            ]);

        session()->flash('encashment_request_submitted', true);

        $encash = new Encashments();

        $encash->users_id               = session()->get('user')->id;
        $encash->payment_option         = $request->payment_option;
        $encash->amount                 = $request->amount;
        $encash->full_name              = $request->full_name;
        $encash->address                = $request->address;
        $encash->mobile_number          = $request->mobile_number;
        $encash->coinsph_wallet_address = $request->coinsph_address;
        $encash->save();

        return redirect('/encashment');
    }

    public function rewardsIndex(Request $request)
    {
        $rewards = Rewards::where('is_published', '!=', Rewards::ARCHIVED)->paginate(15);

        $response            = [];
        $response['rewards'] = $rewards;

        return view('pages.users.rewards', $response);
    }

    public function checkoutIndex(Request $request, $rid)
    {
        $reward = Rewards::find($rid);

        $response = [];

        $response['reward'] = $reward;

        return view('pages.users.rewards-checkout', $response);
    }

    public function rewardClaim(Request $request)
    {
        $this->validate($request, [
            'delivery_address' => 'required',
            'mobile_number'    => 'required',
            'payment_option'   => 'required'
        ]);

        return view('pages.thankyou.reward-claim');
    }
}
