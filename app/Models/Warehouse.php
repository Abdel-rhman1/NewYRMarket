<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Warehouse extends Model
{
    protected $fillable =[

        "vendor_id", "name", "phone", "email", "address", "is_active"
     ];

     public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeVendor($query){
        return $query->where('vendor_id', Auth::user()->v_id);
    }
}
