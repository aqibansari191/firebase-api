<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeModel extends Model
{
    //

    protected $table = 'homes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'group_id',
        'group_name',
        'desc',
        'hero_image_url',
        'item_id',
        'type',
    ];



}
