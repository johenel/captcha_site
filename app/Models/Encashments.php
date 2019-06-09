<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Encashments extends Model
{

    protected $table = 'encashments';

    public const STATUS_PENDING = 0;
    public const STATUS_PROCESSING = 1;
    public const STATUS_FAILED = 2;
    public const STATUS_COMPLETED = 3;

}
