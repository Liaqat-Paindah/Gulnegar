<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->charset='utf8mb4';
            $table->collation='utf8mb4_general_ci';
            $table->id()->primarykey()->autoincreament();
            $table->text('Image_Path');
            $table->string('Product_Name');
            $table->UnsignedBigInteger('Product_ID');
            $table->foreign('Product_ID')->references('id')->on('Products')->onDelete('cascade');
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
        Schema::dropIfExists('images');
    }
}
