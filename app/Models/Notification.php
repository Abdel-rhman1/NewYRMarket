<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'actions';
    protected $casts = ['will_view' => 'array', 'viewed_by' => 'array'];

    protected $fillable =[
        'vendor_id',
        'title',
        'description',
        'permission',
        'icon',
        'link',
        'will_view',
        'viewed_by',
        'status',
        'created_at', 
        'updated_at'
    ];
}
