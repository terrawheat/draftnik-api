<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('picks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('draft_id')->unsigned()->index();
            $table->foreign('draft_id')->references('id')->on('drafts')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('picks');
    }
}
