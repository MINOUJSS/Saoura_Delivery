<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reply_id')->unique();
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')
            ->references('id')
            ->on('admins')
            ->onDelete('cascade');
            $table->unsignedBigInteger('contact_us_id');
            $table->foreign('contact_us_id')
            ->references('id')
            ->on('deleted_contacts')
            ->onDelete('cascade');
            $table->string('to');
            $table->string('subject');
            $table->text('message');
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
        Schema::dropIfExists('deleted_replies');
    }
}
