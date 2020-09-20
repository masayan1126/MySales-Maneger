<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_number');
            $table->string('product_name');
            $table->integer('price');
            // 購入数
            $table->integer('purchase_number');
            $table->integer('user_id');
            $table->string('mail_address');
            $table->string('orderer');
            $table->string('postal_code');
            $table->string('address_line1');
            $table->string('address_line2');
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
        Schema::dropIfExists('orders');
    }
}
