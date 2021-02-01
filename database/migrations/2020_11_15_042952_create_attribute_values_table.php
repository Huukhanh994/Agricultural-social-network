<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributeValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('attribute_values')){
            Schema::create('attribute_values', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('attribute_id')->unsigned();
                $table->foreign('attribute_id')->references('id')->on('attributes');
                $table->text('value');
                $table->decimal('price', 2)->nullable();
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
        Schema::dropIfExists('attribute_values');
    }
}