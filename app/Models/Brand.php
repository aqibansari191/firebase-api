<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    // public $timestamps = false;

    protected $fillable = [
        'name',
        'logo_url',
        'image',
        'address_line1',
        'address_line2',
        'city',
        'country',
        'state',
        'pincode',
        'contact',
        'email',
        'no_voters',
        'ratings',
        'price',
        'partner_id',
        'desc',
        'created_at',
        'updated_at',
    ];

    public function partner()
    {
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }
}
