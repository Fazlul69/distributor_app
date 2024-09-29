<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('category_id')->nullable();
            $table->String('product_name')->nullable();
            $table->double('buy_price')->nullable();
            $table->double('sell_price')->nullable();
            $table->double('discount_price')->nullable();
            $table->double('mrp')->nullable();
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
        Schema::dropIfExists('items');
    }
}
