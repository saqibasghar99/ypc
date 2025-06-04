<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feefixer extends Model
{
    protected $table = 'feefixer';
    
    protected $fillable = [
        'tax_price',
        'shipping_cost',
    ];
}
