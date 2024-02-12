<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeRangeOfChargeAndSellingPriceInComplatedSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('completed__sales', function (Blueprint $table) {
            $table->decimal('charge_price',50,2)->change();
            $table->decimal('selling_price',50,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('completed__sales', function (Blueprint $table) {
            $table->decimal('charge_price',6,2)->change();
            $table->decimal('selling_price',6,2)->change();
        });
    }
}
