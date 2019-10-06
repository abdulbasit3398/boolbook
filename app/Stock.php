<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'user_id', 'title', 'stock_ean', 'stock_bsku', 'nckstock', 'stock',
    ];
}
