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
        Schema::create('primes', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->float('weight_in_grams',8,2);
            $table->float('amount',8,2);
            $table->integer('stock');
            $table->string('cover')->comment('Product Imagen');
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->unsignedBigInteger('product_id');


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
        Schema::dropIfExists('primes');
    }
};
