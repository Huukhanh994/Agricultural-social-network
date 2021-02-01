<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('product_categories')){
            Schema::create('product_categories', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('category_id')->unsigned();
                $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
                $table->bigInteger('product_id')->unsigned();
                $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_categories');
    }
}
