<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productname',
        'productdescription',
        'stockquantity',
        'totalprice',
        'discount',
        'category',
        'size',
        'tags',
        'image',
        'status',
        'preview_image1',
        'preview_image2',
        'preview_image3',
        'tax_price',
        'shipping_cost',
        'costprice'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
    public function categories()
    {
        return $this->belongsTo(Categories::class); // or hasMany, if applicable
    }
    public function specifications()
    {
        return $this->hasOne(ProductSpecification::class);
    }


}
