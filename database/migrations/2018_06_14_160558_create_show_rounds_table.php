<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->dateTime('vote_open');
            $table->dateTime('vote_close');
            $table->enum('status', ['active','not_active'])->default('not_active');
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
        Schema::dropIfExists('show_rounds');
    }
}
