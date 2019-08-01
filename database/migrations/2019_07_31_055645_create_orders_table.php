<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            
            $table->integer('custid');
            $table->string('cname');
            $table->string('email');
            $table->string('addr');
            $table->string('status');
            
            $table->timestamps();
        });

        Schema::create('orderdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('orderid');
            $table->integer('productid');
           // $table->integer('custid');
           // $table->integer('addr');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('total');

            
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
        Schema::dropIfExists('orderdetails');
    }
}
