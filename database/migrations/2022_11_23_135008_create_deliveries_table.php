<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_general_ci';
            $table->id();
            $table->string('Country');
            $table->string('Province');
            $table->string('City');
            $table->string('District');
            $table->string('Home');
            $table->string('Address');
            $table->UnsignedBigInteger('Customer_ID');
            $table->UnsignedBigInteger('Product_ID');
            $table->timestamps();
            $table->foreign('Customer_ID')->references('id')->on('Customers')->onDelete('cascade');
            $table->foreign('Product_ID')->references('id')->on('Products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
