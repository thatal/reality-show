<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 100);
            $table->string('name', 150);
            $table->string('mobile', 150);
            $table->string('email', 150);
            $table->string('facebook', 150);
            $table->string('instagram', 150);
            $table->enum('status', ['active','not_active'])->default('active');
            $table->enum('gender', ['male','female','other']);
            $table->integer('age');
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
        Schema::dropIfExists('artist_masters');
    }
}
