<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('group_users')){
            Schema::create('group_users', function (Blueprint $table) {
                $table->id('group_user_id');
                $table->bigInteger('group_id')->unsigned()->nullable();
                $table->foreign('group_id')->references('group_id')->on('groups')->onDelete('cascade');
                $table->bigInteger('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('group_status')->nullable();
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
        Schema::dropIfExists('group_users');
    }
}
