<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('post_views')) {
            Schema::create('post_views', function (Blueprint $table) {
                $table->id('post_view_id');
                $table->integer('post_view_view');
                $table->bigInteger('post_id')->unsigned();
                $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('post_views');
    }
}
