<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->String('invoice');
            $table->date('date')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->integer('vendor_id')->unsigned();
            $table->String('product_id');
            $table->integer('quantity');
            $table->double('total')->nullable();
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
        Schema::dropIfExists('product_sales');
    }
}
