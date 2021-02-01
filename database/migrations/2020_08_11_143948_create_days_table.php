<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('days')) {
            Schema::create('days', function (Blueprint $table) {
                $table->id('day_id');
                $table->string('day_name')->min(1)->max(31);
                $table->bigInteger('season_id')->unsigned();
                $table->foreign('season_id')->references('season_id')->on('seasonals')->onDelete('cascade');
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
        Schema::dropIfExists('days');
    }
}
