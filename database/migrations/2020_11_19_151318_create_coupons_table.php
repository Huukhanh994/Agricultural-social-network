<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('coupons')){
            Schema::create('coupons', function (Blueprint $table) {
                $table->id('coupon_id');
                $table->string('coupon_code')->unique();
                $table->string('coupon_discount')->comment('giam gia bnhiu?');
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
        Schema::dropIfExists('coupons');
    }
}
