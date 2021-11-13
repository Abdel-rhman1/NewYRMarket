<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package_Has_Feature extends Model
{
    protected $table = 'package_has_features';

    protected $fillable =[
        'package_id',
        'feature_id',
        'status',
        'created_at', 
        'updated_at'
    ];
}
