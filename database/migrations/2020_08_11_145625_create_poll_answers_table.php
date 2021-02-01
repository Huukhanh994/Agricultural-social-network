<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('poll_answers')) {
            Schema::create('poll_answers', function (Blueprint $table) {
                $table->id('poll_answer_id');
                $table->string('poll_answer_content');
                $table->bigInteger('poll_question_id')->unsigned();
                $table->foreign('poll_question_id')->references('poll_question_id')->on('poll_questions')->onDelete('cascade');
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
        Schema::dropIfExists('poll_answers');
    }
}
