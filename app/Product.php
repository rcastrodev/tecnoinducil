<?php

namespace App;

use App\Color;
use App\VariableProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'characteristic', 'description', 'application', 'order', 'extra', 'outstanding', 'image', 'image1', 'image2', 'table'];

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }

    public function variableProducts()
    {
        return $this->hasMany(VariableProduct::class);
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_product', 'product_id', 'product_id_following');
    }
}
