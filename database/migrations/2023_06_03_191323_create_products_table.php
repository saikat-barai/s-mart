<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('added_by');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('childcategory_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('after_discount_price');
            $table->string('sku');
            $table->string('slug');
            $table->string('tags');
            $table->string('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('additional_information')->nullable();
            $table->string('preview')->nullable();
            $table->integer('status')->nullable();
            $table->integer('today_deal')->nullable();
            $table->integer('treandy_product')->nullable();
            $table->integer('banner_product')->nullable();
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
};
