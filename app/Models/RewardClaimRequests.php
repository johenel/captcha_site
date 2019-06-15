<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RewardClaimRequests extends Model
{

    protected $table = 'reward_claim_requests';

    public const PAYMENT_OPTION_REWARD = 1;
    public const PAYMENT_OPTION_MONEY = 2;
    public const STATUS_PENDING = 0;
    public const STATUS_REJECTED = 1;
    public const STATUS_COMPLETED = 2;

    public function getTotalPending()
    {
        $result = DB::table($this->table)->where('status', self::STATUS_PENDING)->where('users_id', session()->get('user')->id)
            ->join('rewards','reward_claim_requests.reward_id','=','rewards.id')
            ->select(DB::raw('sum(rewards.price_money_balance) as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotalCompleted()
    {
        $result = DB::table($this->table)->where('status', self::STATUS_COMPLETED)->where('users_id', session()->get('user')->id)
            ->join('rewards','reward_claim_requests.reward_id','=','rewards.id')
            ->select(DB::raw('sum(rewards.price_money_balance) as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotal()
    {
        return $this->getTotalCompleted() + $this->getTotalPending();
    }
}
