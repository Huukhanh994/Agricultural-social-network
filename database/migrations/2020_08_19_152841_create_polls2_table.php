<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolls2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('polls')) {
            Schema::create('polls', function (Blueprint $table) {
                $table->id('poll_id');
                $table->string('poll_code', 20)->unique();
                $table->text('poll_title', 100);
                $table->string('poll_slug', 100)->unique();
                $table->string('poll_type', 50);
                $table->string('poll_published', 20);
                $table->dateTime('poll_start_time');
                $table->dateTime('poll_end_time');
                $table->text('poll_content');

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
        Schema::dropIfExists('polls2');
    }
}
