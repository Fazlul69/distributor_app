<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inputs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('invoice');
            $table->bigInteger('supplier_id');
            $table->bigInteger('product_id');
            $table->bigInteger('category_id')->nullable();
            $table->double('company_price')->nullable();
            $table->double('discount_price')->nullable();
            $table->double('sell_price')->nullable();
            $table->double('mrp')->nullable();
            $table->integer('quantity');
            $table->double('total')->nullable();
            $table->date('date')->nullable();
            $table->integer('vendor_id')->unsigned();
            $table->double('grand_total')->nullable();
            $table->double('grand_discount')->nullable();
            $table->double('payed')->nullable();
            $table->double('due')->nullable();
            // $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
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
        Schema::dropIfExists('product_inputs');
    }
}
