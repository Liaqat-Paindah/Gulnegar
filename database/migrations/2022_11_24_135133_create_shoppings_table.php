<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShoppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppings', function (Blueprint $table) {
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_general_ci';
            $table->id();
            $table->string('Total_Price');
            $table->string('Billing');
            $table->UnsignedBigInteger('Product_ID');
            $table->UnsignedBigInteger('Customer_ID');
            $table->foreign('id')->references('id')->on('Visitors')->onDelete('cascade');
            $table->foreign('Product_ID')->references('id')->on('Products')->onDelete('cascade');
            $table->foreign('Customer_ID')->references('id')->on('Customers')->onDelete('cascade');
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
        Schema::dropIfExists('shoppings');
    }
}
