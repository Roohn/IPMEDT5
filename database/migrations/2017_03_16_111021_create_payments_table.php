<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->increments('id');
           $table->double('price');
           $table->DateTime('paymentdate');
           $table->integer('customer_id')->unsigned();
           $table->rememberToken();
           $table->timestamps();
       });
       Schema::table('payments', function(Blueprint $table)
        {
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
