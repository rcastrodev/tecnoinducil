<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VariableProduct extends Model
{
    protected $fillable = ['product_id', 'section_mm', 'training_mm', 'diameter', 'copper_weight_kg_km', 'thickness_mm', 'cable_diameter_mm', 'cable_weight_Kg_Km', 'resistance_max_ohms_km', 'current_max'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
