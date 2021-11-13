<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyLang extends Model
{
    protected $table = 'key_lang';

    protected $fillable =[
        'key','value', 'lang_id', 'status', 'created_at', 'updated_at'
    ];
}
