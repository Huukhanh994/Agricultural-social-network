<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('experience_farms')) {
            Schema::create('experience_farms', function (Blueprint $table) {
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
                $table->string('experience_farm_time_farm')->nullable();
                $table->bigInteger('season_id')->unsigned();
                $table->foreign('season_id')->references('season_id')->on('seasonals')->onDelete('cascade');
                $table->string('experience_farm_water')->nullable();
                $table->string('experience_farm_soil_properties')->nullable();
                $table->dateTime('experience_farm_start_to_do')->nullable();
                $table->dateTime('experience_farm_end_to_do')->nullable();
                $table->text('experience_farm_notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experience_farms');
    }
}
