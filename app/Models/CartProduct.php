<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    protected $table = 'cartproducts'; 
    protected $fillable = ['user_id', 'product_id', 'quantity', 'color', 'size', 'unit_price', 'total_price', 'currency'];

    public function product()
    {
        return $this->belongsTo(Product::class); 
    }
}
