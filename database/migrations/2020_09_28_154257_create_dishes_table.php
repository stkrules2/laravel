<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('availibility');
            $table->boolean('sale')->nullable();
            $table->boolean('special_product')->nullable();
            $table->bigInteger('price');
            $table->bigInteger('before_discount_price')->nullable();
            $table->text('description');
            $table->string('image1');
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->bigInteger('category_id');
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
        Schema::dropIfExists('dishes');
    }
}