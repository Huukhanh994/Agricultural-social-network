<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id('product_id');
                $table->string('product_code', 12)->unique();
                $table->string('product_name');
                $table->decimal('product_price',20,6)->nullable();
                $table->bigInteger('category_id')->unsigned();
                $table->string('product_slug')->nullable();
                $table->text('product_description')->nullable();
                $table->unsignedInteger('product_quantity')->nullable();
                $table->decimal('product_weight', 8, 2)->nullable();
                $table->decimal('product_sale_price', 8, 2)->nullable();
                $table->boolean('product_status')->default(1);
                $table->boolean('product_featured')->default(0);
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
        Schema::dropIfExists('products');
    }
}
