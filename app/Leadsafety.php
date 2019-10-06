<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leadsafety extends Model
{
    protected $fillable = [
        'user_id', 'stock_ean',
    ];
}
