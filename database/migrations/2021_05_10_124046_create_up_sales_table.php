<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('up_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('first_product_id');
            $table->foreign('first_product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            $table->unsignedBigInteger('second_product_id');
            $table->foreign('second_product_id')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');
            //type (type=1 => منتجات مشابهة)(type=2 => منتجات تابعة)
            $table->Integer('type');
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
        Schema::dropIfExists('up_sales');
    }
}
