<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcomsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ecomsales', function (Blueprint $table) {
            $table->increments('id');
            $table->String('invoice');
            $table->date('date')->nullable();
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->string('brand');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->double('total')->nullable();
            $table->double('grand_total')->nullable();
            $table->double('grand_discount')->nullable();
            $table->double('payed')->nullable();
            $table->double('due')->nullable();
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
        Schema::dropIfExists('ecomsales');
    }
}
