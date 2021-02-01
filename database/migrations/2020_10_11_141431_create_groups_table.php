<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('groups')){
            Schema::create('groups', function (Blueprint $table) {
                $table->id('group_id');
                $table->string('group_code', 12)->unique();
                $table->string('group_name')->nullable();
                $table->text('group_description')->nullable();
                $table->integer('group_members')->default(0)->nullable();
                $table->tinyInteger('group_is_private')->default(0)->nullable();
                $table->string('group_avatar')->nullable();
                $table->bigInteger('category_id')->unsigned()->nullable();
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
        Schema::dropIfExists('groups');
    }
}
