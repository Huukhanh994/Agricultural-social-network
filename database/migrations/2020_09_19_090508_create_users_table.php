<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id('id');
                $table->string('name');
                $table->date('birth');
                $table->string('gender');
                $table->string('is_block')->nullable();
                $table->string('tel')->nullable();
                $table->string('status')->nullable();
                $table->string('is_connect')->nullable();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('user_avatar')->nullable();
                $table->bigInteger('role_id')->unsigned();
                $table->bigInteger('permission_id')->unsigned();
                $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
                $table->foreign('permission_id')->references('permission_id')->on('permissions')->onDelete('cascade');
                $table->bigInteger('ward_id')->unsigned();
                $table->foreign('ward_id')->references('ward_id')->on('wards')->onDelete('cascade');
                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
