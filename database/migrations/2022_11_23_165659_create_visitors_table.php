<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_general_ci';
            $table->id();
            $table->string('distination');
            $table->string('Delivery_Price');
            $table->string('duration');
            $table->timestamps();
            $table->foreign('id')->references('id')->on('Deliveries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
