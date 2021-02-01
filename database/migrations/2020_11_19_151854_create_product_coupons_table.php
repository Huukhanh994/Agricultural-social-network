<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('product_coupons')){
            Schema::create('product_coupons', function (Blueprint $table) {
                $table->id('product_coupon_id');
                $table->bigInteger('product_id')->unsigned();
                $table->bigInteger('coupon_id')->unsigned();
                $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
                $table->foreign('coupon_id')->references('coupon_id')->on('coupons')->onDelete('cascade');
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
        Schema::dropIfExists('product_coupons');
    }
}
