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
        Schema::create('check_outs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('checkout_id')->unique();
            $table->string('sold_to')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('ship_cost')->nullable();
            $table->string('ship_price')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();

            $table->string('card_name')->nullable();
            $table->string('tcgplacer_id')->nullable();
            $table->string('tcg_mid')->nullable();
            $table->string('qty')->nullable();
            $table->string('total')->nullable();
            $table->string('payment_status')->default('pending');


            $table->json('cart_contents');
         
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('check_outs');
    }
};
