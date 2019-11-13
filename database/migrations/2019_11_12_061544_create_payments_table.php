<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaction_id');
            $table->string('email');
            $table->float('total_price');
            $table->float('subtotal_price');
            $table->float('total_discounts');
            $table->integer('total_weight');
            $table->float('total_tax');
            $table->string('currency');
            $table->integer('order_number');
            $table->bigInteger('customer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->json('data');
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
        Schema::dropIfExists('payments');
    }
}
