<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletedSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed__sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consumer_id');
            $table->foreign('consumer_id')
            ->references('id')
            ->on('consumers')
            ->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->Integer('qty');
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
        Schema::dropIfExists('completed__sales');
    }
}
