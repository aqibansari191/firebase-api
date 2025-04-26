<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membershipModel extends Model
{
    protected $table = 'membership';
    protected $primaryKey = 'member_id';

    protected $fillable = [
        'brand_id',
        'brand_name',
        'brand_logo_url',
        'coupon_title_tab1',
        'coupon_title_tab2',
        'desc',
        'duration',
        'fcm_token',
        'hero_image_url',
        'custom_id',
        'is_food_without_stay',
        'more_info',
        'no_of_coupons',
        'offers',
        'price',
        'title',
        'type',
        'unit',
        'start_date',
    ];
}
