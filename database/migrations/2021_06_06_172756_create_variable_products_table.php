<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariableProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variable_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('section_mm')->nullable();
            $table->string('training_mm')->nullable();
            $table->string('diameter')->nullable();
            $table->string('copper_weight_kg_km')->nullable();
            $table->string('thickness_mm')->nullable();
            $table->string('cable_diameter_mm')->nullable();
            $table->string('cable_weight_Kg_Km')->nullable();
            $table->string('resistance_max_ohms_km')->nullable();
            $table->string('current_max_180_at')->nullable();
            $table->timestamps(); 
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variable_products');
    }
}
