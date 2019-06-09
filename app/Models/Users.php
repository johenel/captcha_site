<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions;
use DB;
use Carbon\Carbon;

class Users extends Model
{

    protected $hidden = ['password'];
    private $user;

    public const PENDING = 0;
    public const ACTIVATED = 1;
    public const DEACTIVATED = 2;

    public const TYPE_USERS = 1;
    public const TYPE_ADMIN = 2;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user = session()->get('user');
    }

    public function activationRequests()
    {
        return $this->hasMany('App\Models\ActivationRequestDetails', 'users_id');
    }

    public function encashments()
    {
        return $this->hasMany('App\Models\Encashments', 'users_id');
    }

    public function getTodaysCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)
            ->where('type_id', 1)
            ->where('status_id', 3)
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d') . '%')
            ->count();
    }

    public function getTodaysEarning()
    {
        $total = 0;

        $result = Transactions::where('users_id', session()->get('user')->id)
            ->whereIn('type_id', [1, 3])
            ->where('status_id', 3)
            ->select(DB::raw('sum(value) as total'))
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d') . '%')
            ->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getTotalCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)->where('type_id', 1)->where('status_id', 3)->count();
    }

    public function getTotalIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id', $this->user->id)->whereIn('type_id', [1, 3])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getCaptchaIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id', $this->user->id)->whereIn('type_id', [1])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getReferralIncome()
    {
        $total = 0;

        $result = Transactions::where('users_id', $this->user->id)->whereIn('type_id', [3])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getTotalEncashment()
    {
        $total = 0;

        $result = Transactions::where('users_id', $this->user->id)->where('type_id', 2)->where('status_id', 0)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getPendingEncashment()
    {
        $total = 0;

        $encashments = Encashments::where('users_id', $this->user->id)->where('status', 0)->select(DB::raw('sum(amount) as total'))->get();

        if (count($encashments) > 0) {
            $total = $encashments[0]->total;
        }

        return $total ? $total : 0;
    }
}
