<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoterMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voter_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('mobile')->unique();
            $table->string('ip')->nullable();
            $table->string('otp');
            $table->dateTime('date_of_registration');
            $table->dateTime('date_of_activation')->nullable();
            $table->dateTime('otp_sent_date');
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
        Schema::dropIfExists('voter_masters');
    }
}
