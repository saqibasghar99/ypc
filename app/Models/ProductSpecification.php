<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel uses plural by default)
    protected $table = 'product_specifications';

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'product_id',
        'brand',
        'model',
        'display',
        'processor',
        'ram',
        'storage',
        'battery',
        'os',
        'camera',
        'connectivity',
        'weight',
        'dimensions',
        'warranty',
        'included_items',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
