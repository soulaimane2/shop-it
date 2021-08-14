<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('ProductCODE');
            $table->string('ProductName');
            $table->integer('Quantity');
            $table->integer('ProductCategory');
            $table->integer('ProductSubCategory');
            $table->integer('ProductBrand');
            $table->string('sizes');
            $table->string('colors');
            $table->float('amount');
            $table->float('discount');
            $table->longText('description');
            $table->string('videoLink');
            $table->string('MainImage');
            $table->text('imagesLinks');
            $table->string('sliders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
