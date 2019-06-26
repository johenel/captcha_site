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

    public function getTotalPending($uid = null)
    {
        $userId = $uid ? $uid : session()->get('user')->id;

        $result = DB::table($this->table)->where('status', self::STATUS_PENDING)->where('users_id', $userId)
            ->join('rewards', 'reward_claim_requests.reward_id', '=', 'rewards.id')
            ->select(DB::raw('sum(rewards.price_money_balance) as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotalCompleted($uid = null)
    {
        $userId = $uid ? $uid : session()->get('user')->id;

        $result = DB::table($this->table)->where('status', self::STATUS_COMPLETED)->where('users_id', $userId)
            ->join('rewards', 'reward_claim_requests.reward_id', '=', 'rewards.id')
            ->select(DB::raw('sum(rewards.price_money_balance) as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotal($uid = null)
    {

        return $this->getTotalCompleted($uid) + $this->getTotalPending($uid);
    }

    public function reward()
    {
        return $this->hasOne('\App\Models\Rewards', 'id', 'reward_id');
    }

    public function user()
    {
        return $this->hasOne('\App\Models\Users', 'id', 'users_id');
    }
}
