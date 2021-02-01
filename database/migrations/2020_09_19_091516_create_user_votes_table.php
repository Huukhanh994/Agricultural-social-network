<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_votes')) {
            Schema::create('user_votes', function (Blueprint $table) {
                // $table->id();
                $table->string('user_vote_vote');
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->bigInteger('poll_answer_id')->unsigned();
                $table->foreign('poll_answer_id')->references('poll_answer_id')->on('poll_answers')->onDelete('cascade');

                $table->bigInteger('poll_id')->unsigned();
                $table->foreign('poll_id')->references('poll_id')->on('polls')->onDelete('cascade');
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
        Schema::dropIfExists('user_votes');
    }
}
