<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';

    protected $fillable =[
        'name','short_name', 'icon', 'direction', 'status', 'created_at', 'updated_at'
    ];

}
