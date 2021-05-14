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
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->onDelete('cascade');
            $table->bigInteger('product_id');
            $table->string('product_name');
            $table->decimal('charge_price',6,2);
            $table->decimal('selling_price',6,2);
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
