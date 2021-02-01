<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id('weather_id');
            $table->string('weather_code',12)->unique();
            $table->string('weather_name');
            $table->double('weather_number')->nullable();
            $table->text('weather_notes')->nullable();
            $table->bigInteger('season_id')->unsigned();
            $table->foreign('season_id')->references('season_id')->on('seasonals')->onDelete('cascade');
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
        Schema::dropIfExists('weather');
    }
}
