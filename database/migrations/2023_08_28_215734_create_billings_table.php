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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('customer_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->integer('phone');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('zip')->nullable();
            $table->string('company_name')->nullable();
            $table->string('address');
            $table->string('additional_info')->nullable();
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
        Schema::dropIfExists('billings');
    }
};
