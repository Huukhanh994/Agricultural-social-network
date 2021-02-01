<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('group_post')) {
            Schema::create('group_post', function (Blueprint $table) {
                $table->bigInteger('group_id')->unsigned()->nullable();
                $table->foreign('group_id')->references('group_id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
                $table->bigInteger('post_id')->unsigned()->nullable();
                $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('group_post');
    }
}
