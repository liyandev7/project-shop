<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFontProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('font_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('font_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('font_id')->references('id')->on('fonts')->onDelete('cascade');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('font_product');
    }
}