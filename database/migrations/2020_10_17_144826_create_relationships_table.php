<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('relationships')) {
            Schema::create('relationships', function (Blueprint $table) {
                $table->id('relationship_id');
                $table->bigInteger('sender_id')->nullable();
                $table->bigInteger('receiver_id')->nullable();
                $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
                $table->integer('status')->nullable()->comment('0: Peding, 1: Accepted,2: Declined, 3: Blocked')->default('0');
                $table->bigInteger('action_user_id')->nullable()->comment('người dùng thao tác action cuối cùng');
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
        Schema::dropIfExists('relationships');
    }
}
