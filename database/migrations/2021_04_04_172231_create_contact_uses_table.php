<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('consumer_id');
            $table->foreign('consumer_id')
            ->references('id')
            ->on('consumers')
            ->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->string('title');
            $table->text('message');
            $table->string('image')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('contact_uses');
    }
}
