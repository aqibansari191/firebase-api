<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Partner extends Model
{
    protected $table = 'partners';
    // public $timestamps = false;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'gender',
        'number',
        'new_user',
        'status',
        'brand_id',
        'created_at',
    ];

    protected $casts = [
        'brand_id' => 'array',
    ];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'partner_id', 'id');
    }
}

