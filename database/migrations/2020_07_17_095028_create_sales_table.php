<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->boolean('check')->default(false);
            $table->bigIncrements('id');
            $table->string('product_number')->nullable();
            $table->string('product_color')->nullable();
            $table->string('sales_channel')->nullable();
            $table->string('sales_date')->nullable();
            $table->integer('sales_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
