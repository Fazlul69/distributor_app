<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalenotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salenotes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('invoice');
            $table->bigInteger('customer_id');
            $table->integer('vendor_id');
            $table->double('subtotal');
            $table->double('payed');
            $table->double('due');
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
        Schema::dropIfExists('salenotes');
    }
}
