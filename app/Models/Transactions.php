<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $types = 'transaction_types';
    protected $statuses = 'transaction_statuses';

    public function getTypes()
    {
        return DB::table($this->types)->get();
    }

    public function getStatuses()
    {
        return DB::table($this->statuses)->get();
    }
}
