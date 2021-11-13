<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'features';

    protected $fillable =[
        'features',
        'slug',
        'status',
        'is_features',
        'created_at', 
        'updated_at'
    ];
    public function packages()
    {
        return $this->belongsToMany('App\Models\Package','package_has_features');
    }
}
