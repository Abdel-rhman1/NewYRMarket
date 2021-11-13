<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model
{
    protected $fillable =[
        "vendor_id","name", "code", "type", "barcode_symbology", "brand_id", "category_id", "unit_id", 
        "purchase_unit_id", "sale_unit_id", "cost", "price", "qty", "alert_quantity", "promotion",
         "promotion_price", "starting_date", "last_date", "tax_id", "tax_method", "image", "file", 
         "is_variant", "is_diffPrice", "featured", "product_list", "qty_list", "price_list", 
         "product_details", "is_active",
    ];

    public function scopeActive($query){
        return $query->where('is_active',1);
    }

    public function scopeVendor($query){
        return $query->where('vendor_id', Auth::user()->v_id);
    }
}
