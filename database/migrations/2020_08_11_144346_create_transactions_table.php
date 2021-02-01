<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('transactions')) {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id('transaction_id');
                $table->string('transaction_number',12)->unique();
                $table->enum('transaction_status', ['pending', 'processing', 'completed', 'decline'])->default('pending');
                $table->decimal('transaction_grand_total',20,6);
                $table->integer('transaction_item_count');
                $table->string('transaction_first_name');
                $table->string('transaction_last_name');
                $table->string('transaction_email');
                $table->string('transaction_address');
                $table->string('transaction_city');
                $table->string('transaction_tel');
                $table->string('transaction_notes');
                $table->boolean('payment_status')->default(1);
                $table->string('payment_method')->nullable();
                $table->bigInteger('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('transactions');
    }
}
