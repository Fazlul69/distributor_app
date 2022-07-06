<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shop_name');
            $table->integer('vendor_id');
            $table->integer('product_id');
            $table->integer('dp');
            $table->integer('tp');
            $table->integer('shop_back');
            $table->integer('return_company');
            $table->integer('company_back');
            $table->integer('return_shop');
            $table->date('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replaces');
    }
}
