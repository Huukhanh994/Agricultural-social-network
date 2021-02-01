<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsecticidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('insecticides')) {
            Schema::create('insecticides', function (Blueprint $table) {
                $table->id('insecticide_id');
                $table->string('insecticide_code',12)->unique();
                $table->string('insecticide_name');
                $table->string('insecticide_ingredient')->nullable()->comment('Thành phần');
                $table->string('insecticide_dosage')->nullable()->comment('Liều lượng');
                $table->string('insecticide_indication')->comment('chỉ định');
                $table->string('insecticide_age')->comment('Độ tuổi động vật/ bao nhiêu ngày cây trồng');
                $table->integer('insecticide_amount')->comment('Liều lượng');
                $table->string('insecticide_producer')->comment('nhà sản xuất thuốc');
                $table->string('insecticide_produce_date')->comment('ngày sản xuất');
                $table->string('insecticide_expiry_date')->comment('hạn sử dụng');
                $table->decimal('insecticide_price',20,6);
                $table->text('insecticide_notes')->nullable();
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
        Schema::dropIfExists('insecticides');
    }
}
