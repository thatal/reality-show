<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoterTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('artist_in_round_id')->references('id')->on('artist_in_rounds')->onDelete('cascade');
            $table->integer('voter_master_id')->references('id')->on('voter_masters')->onDelete('cascade');
            $table->integer('total_vote')->default(0);
            $table->dateTime('date_of_transaction')->nullable();
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
        Schema::dropIfExists('voter_transactions');
    }
}
