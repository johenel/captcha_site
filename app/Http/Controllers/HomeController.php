<?php

namespace App\Http\Controllers;

use App\Models\Encashments;
use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;
use URL;
use App\Models\Users;

class HomeController extends Controller
{

    protected $user;

    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            if (session()->get('user')->is_activated == 1) {
                $this->user = $request->session()->get('user');
                $response   = $this->getIncomeStatistics();

                return view('pages.home', $response);
            }
            return redirect('/activate-account');
        }

        $response           = [];
        $response['action'] = $request->action;

        return view('welcome', $response);
    }

    private function getIncomeStatistics()
    {
        $response = [];

        $usersModel      = new Users;
        $encashmentModel = new Encashments;

        $response['total_income']       = $usersModel->getTotalIncome();
        $response['total_encashment']   = $encashmentModel->getTotalEncashments();
        $response['pending_encashment'] = $usersModel->getPendingEncashment();
        $response['referral_income']    = $usersModel->getReferralIncome();
        $response['captcha_income']     = $usersModel->getCaptchaIncome();
        $response['money_balance']      = $usersModel->getMoneyBalance();
        $response['reward_points']      = 0;
        $response['referral_link']      = URL::to('/') . '?action=signup&ref=' . encrypt($this->user->email);

        return $response;
    }


}
