<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('post_images')) {
            Schema::create('post_images', function (Blueprint $table) {
                $table->id('post_image_id');
                $table->bigInteger('post_id')->unsigned();
                $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
                $table->string('post_image_path');
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
        Schema::dropIfExists('post_images');
    }
}
