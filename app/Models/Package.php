<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    protected $casts = ['duration' => 'array'];

    protected $fillable =[
        'package_name',
        'slug',
        'price',
        'package_type', 
        'order_limit', 
        'product_limit',
        'status',
        'created_at', 
        'updated_at'
    ];
    public function features()
    {
        return $this->belongsToMany('App\Models\Feature','package_has_features');
    }
}
