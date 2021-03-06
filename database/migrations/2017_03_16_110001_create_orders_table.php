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
           $table->increments('id');
           $table->string('status');
           $table->DateTime('ordered_on');
           $table->integer('customer_id')->unsigned();
           $table->rememberToken();
           $table->timestamps();
       });
       Schema::table('orders', function(Blueprint $table)
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
         Schema::dropfExists('orders');
     }
}
