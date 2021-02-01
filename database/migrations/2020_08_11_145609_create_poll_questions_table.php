<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('poll_questions')) {
            Schema::create('poll_questions', function (Blueprint $table) {
                $table->id('poll_question_id');
                $table->string('poll_question_type',30);
                $table->text('poll_question_content');
                $table->string('poll_question_instruction')->nullable();
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
        Schema::dropIfExists('poll_questions');
    }
}
