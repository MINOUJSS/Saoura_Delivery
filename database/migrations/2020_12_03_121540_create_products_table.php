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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
            ->references('id')
            ->on('suppliers')
            ->onDelete('cascade');
            $table->string('name')->unique();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade');
            $table->string('image');
            $table->text('short_description');
            $table->text('long_description');
            $table->double('Purchasing_price');
            $table->double('selling_price');
            $table->double('reating')->default(0);
            $table->integer('qty');
            $table->integer('category_id');
            $table->integer('sub_category_id')->default(0);
            $table->integer('sub_sub_category_id')->default(0);
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')
            ->references('id')
            ->on('colors')
            ->onDelete('cascade');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
