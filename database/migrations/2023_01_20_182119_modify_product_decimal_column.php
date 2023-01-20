<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProductDecimalColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('Purchasing_price',20,2)->change();
            $table->decimal('to_magazin_price',20,2)->change();
            $table->decimal('to_consumer_price',20,2)->change();
            $table->decimal('ombalage_price',20,2)->change();
            $table->decimal('adds_price',20,2)->change();
            $table->decimal('selling_price',20,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('Purchasing_price',6,2)->change();
            $table->decimal('to_magazin_price',6,2)->change();
            $table->decimal('to_consumer_price',6,2)->change();
            $table->decimal('ombalage_price',6,2)->change();
            $table->decimal('adds_price',6,2)->change();
            $table->decimal('selling_price',6,2)->change();
        });
    }
}
