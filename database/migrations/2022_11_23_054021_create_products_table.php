<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id()->primarykey()->auto_increament();
            $table->string('Name');
            $table->string('Color');
            $table->string('Size');
            $table->string('Price');
            $table->string('Gender');
            $table->date('Date');
            $table->string('Weight');
            $table->text('Images');
            $table->text('Desc');
            $table->string('Status');
            $table->UnsignedBigInteger('Fabric_ID');
            $table->UnsignedBigInteger('Model_ID');
            $table->UnsignedBigInteger('Sewing_ID');
            $table->UnsignedBigInteger('Catagories_ID');
            $table->timestamps();
            $table->foreign('Sewing_ID')->references('id')->on('Sewings')->onDelete('cascade');
            $table->foreign('Fabric_ID')->references('id')->on('Fabrics')->onDelete('cascade');
            $table->foreign('Model_ID')->references('id')->on('Models')->onDelete('cascade');
            $table->foreign('Catagories_ID')->references('id')->on('Catagories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
