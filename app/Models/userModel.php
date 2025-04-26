<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'number',
        'gender',
        'address',
        'agent_id',
        'referral_code',
        'other_referral_code',
        'fcm_token',
        'new_user',
        'status',
        'type'
    ];
    protected $hidden = [
        'password',
    ];
}
