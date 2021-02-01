<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('food')) {
            Schema::create('food', function (Blueprint $table) {
                $table->id('food_id');
                $table->string('food_code',8)->unique();
                $table->string('food_name');
                $table->string('food_description');
                $table->string('food_price');

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
        Schema::dropIfExists('food');
    }
}
