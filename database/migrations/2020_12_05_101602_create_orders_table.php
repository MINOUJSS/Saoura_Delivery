<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedBigInteger('consumer_id')->index()->nullable();
            $table->foreign('consumer_id')
            ->references('id')
            ->on('consumers')
            ->onDelete('cascade');
            $table->string('billing_name');                        
            $table->string('billing_email');
            $table->text('billing_address');
            $table->string('billing_mobile');
            $table->string('status');
            $table->text('obs')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
