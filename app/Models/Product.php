<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'detail', 'brand_id', 'product_category_id', 'featured'
    ];

    protected $cast = [
        'brand_id' => 'integer',
        'product_category_id' => 'integer',
        'featured' => 'integer',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
