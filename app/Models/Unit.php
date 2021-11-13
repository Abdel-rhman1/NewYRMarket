<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Unit extends Model
{
    protected $fillable =[

        "vendor_id","unit_code", "unit_name", "base_unit", "operator", "operation_value", "is_active"
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeVendor($query){
        return $query->where('vendor_id', Auth::user()->v_id);
    }
}
