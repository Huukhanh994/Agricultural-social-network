<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('post_videos')) {
            Schema::create('post_videos', function (Blueprint $table) {
                $table->id('post_video_id');
                $table->bigInteger('post_id')->unsigned();
                $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
                $table->string('post_video_path');
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
        Schema::dropIfExists('post_videos');
    }
}
