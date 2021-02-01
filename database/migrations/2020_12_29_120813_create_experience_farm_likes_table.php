<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceFarmLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_farm_likes', function (Blueprint $table) {
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->bigInteger('experience_farm_id')->unsigned();
            $table->foreign('experience_farm_id')->references('experience_farm_id')->on('experience_farms')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('experience_farm_likes');
    }
}
