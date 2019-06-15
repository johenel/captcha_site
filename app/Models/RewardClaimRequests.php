<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RewardClaimRequests extends Model
{

    protected $table = 'reward_claim_requests';

    public const PAYMENT_OPTION_REWARD = 1;
    public const PAYMENT_OPTION_MONEY = 2;
}
