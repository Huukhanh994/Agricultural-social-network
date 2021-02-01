<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropPlantAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('crop_plant_animals')) {
            Schema::create('crop_plant_animals', function (Blueprint $table) {
                $table->id('crop_plant_animal_id');
                $table->string('crop_plant_animal_code', 12)->unique();
                $table->string('crop_plant_animal_name');
                $table->string('crop_plant_animal_growth_time');
                $table->string('crop_plant_animal_color', 30)->nullable();
                $table->string('crop_plant_animal_weight', 30)->nullable();
                $table->string('crop_plant_animal_height', 30)->nullable();

                $table->bigInteger('product_id')->unsigned();
                $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('crop_plant_animals');
    }
}
