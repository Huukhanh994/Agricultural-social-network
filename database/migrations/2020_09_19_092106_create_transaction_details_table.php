<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transaction_details')) {
            Schema::create('transaction_details', function (Blueprint $table) {
                $table->integer('transaction_detail_qty_food')->nullable();
                $table->integer('transaction_detail_qty_insecticide')->nullable();
                $table->integer('transaction_detail_qty_cpa')->nullable();
                $table->decimal('transaction_detail_price', 20, 6);
                $table->bigInteger('product_id')->unsigned()->nullable();
                $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
                $table->bigInteger('transaction_id')->unsigned()->nullable();
                $table->foreign('transaction_id')->references('transaction_id')->on('transactions')->onDelete('cascade');
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
        Schema::dropIfExists('transaction_details');
    }
}
