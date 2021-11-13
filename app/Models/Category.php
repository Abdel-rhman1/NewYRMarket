<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Category extends Model
{
    protected $fillable =[

        "vendor_id","name", 'image', "parent_id", "is_active"
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeVendor($query){
        return $query->where('vendor_id', Auth::user()->v_id);
    }
}
