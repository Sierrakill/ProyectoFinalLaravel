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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('folio');
            $table->unsignedBigInteger('client_id')->nullable();
            $table->unsignedBigInteger('prime_id')->nullable();
            $table->integer('quantity');
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->integer('status')->comment('0:Pendiente envio,1:En camino,2:Entregada,3:Cancelada,4:Olvidada,5:Pendiente de pago');
            $table->integer('payment_method')->comment('1:Card,2:Cash');
            $table->float('amount',8,2);

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('prime_id')->references('id')->on('primes')->onDelete('set null');
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
};
