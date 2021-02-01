<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('message_groups')){
            Schema::create('message_groups', function (Blueprint $table) {
                $table->id('message_group_id');
                $table->string('type');
                $table->bigInteger('from_id')->unsigned();
                $table->foreign('from_id')->references('id')->on('users')->onDelete('cascade');
                $table->bigInteger('to_id')->unsigned();
                $table->foreign('to_id')->references('group_id')->on('groups')->onDelete('cascade');
                $table->string('body')->nullable();
                $table->string('attachment')->nullable();
                $table->tinyInteger('seen', 2)->default(0);
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
        Schema::dropIfExists('message_groups');
    }
}
