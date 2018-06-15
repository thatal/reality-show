<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistInRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_in_rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_round_id')->references('id')->on('show_rounds')->onDelete('cascade');
            $table->integer('artist_master_id')->references('id')->on('artist_masters')->onDelete('cascade');
            $table->string('artist_image')->nullable();
            $table->string('youtube_id')->nullable();
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
        Schema::dropIfExists('artist_in_rounds');
    }
}
