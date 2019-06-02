<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $hidden = ['password'];

    public function activationRequests()
    {
        return $this->hasMany('App\Models\ActivationRequestDetails', 'users_id');
    }
}
