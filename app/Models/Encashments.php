<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encashments extends Model
{
    protected $table = 'encashments';

    public const STATUS_PENDING = 0;
    public const STATUS_PROCESSED = 1;

}
