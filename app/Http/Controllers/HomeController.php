<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;
use URL;

class HomeController extends Controller
{
    protected $user;

    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            if(session()->get('user')->is_activated == 1) {
                $this->user = $request->session()->get('user');
                $response = $this->getIncomeStatistics();

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

        $response['total_income']      = $this->getTotalIncome();
        $response['total_encashment']  = $this->getTotalEncashment();
        $response['remaining_balance'] = $this->getTotalIncome(); - $this->getTotalEncashment();
        $response['referral_income']   = $this->getReferralIncome();
        $response['captcha_income']    = $this->getCaptchaIncome();
        $response['reward_points']     = 0;
        $response['referral_link'] = URL::to('/') .'?action=signup&ref=' . encrypt($this->user->email);

        return $response;
    }

    private function getTotalIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id',$this->user->id)->whereIn('type_id', [1, 3])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    private function getCaptchaIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id',$this->user->id)->whereIn('type_id', [1])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    private function getReferralIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id',$this->user->id)->whereIn('type_id', [3])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    private function getTotalEncashment()
    {
        $total = 0;

        $result = Transactions::where('users_id',$this->user->id)->where('type_id', 2)->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }
}
