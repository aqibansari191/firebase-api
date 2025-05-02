<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    //
    protected $table ="orders";
    protected $primaryKey= "id";

    protected $fillable = [
        'agent_id',
        'amount',
        'brand_id',
        'email',
        'order_id',
        'membership_id',
        'name',
        'order_by',
        'order_no',
        'receipt',
        'status',
        'user_id',
    ];
    }

