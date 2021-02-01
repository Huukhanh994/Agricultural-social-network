<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->id('post_id');
                $table->string('post_slug')->unique();
                $table->string('post_title')->unique();
                $table->string('post_content');
                $table->double('post_price')->nullable();
                $table->string('post_status')->default('pending');
                $table->tinyInteger('post_published')->default(0)->nullable();
                $table->string('status_user',12)->nullable();

                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('category_id')->unsigned();
                $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
