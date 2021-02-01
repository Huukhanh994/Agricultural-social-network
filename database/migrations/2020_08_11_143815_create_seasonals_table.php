<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeasonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('seasonals')) {
            Schema::create('seasonals', function (Blueprint $table) {
                $table->id('season_id');
                $table->string('season_code')->unique();
                $table->string('season_name');
                $table->text('season_note')->nullable();
                $table->date('season_start_date')->nullable();
                $table->date('season_end_date')->nullable();
                $table->bigInteger('year_id')->unsigned();
                $table->foreign('year_id')->references('year_id')->on('years')->onDelete('cascade');
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
        Schema::dropIfExists('searsonals');
    }
}
