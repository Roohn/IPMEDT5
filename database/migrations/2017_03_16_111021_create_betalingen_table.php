<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetalingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('betalingen', function (Blueprint $table) {
           $table->increments('betalingsnr');
           $table->double('prijs');
           $table->DateTime('betalingsdatum');
           $table->integer('klantnr_fk')->unsigned();
           $table->rememberToken();
           $table->timestamps();
       });
       Schema::table('betalingen', function(Blueprint $table)
        {
            $table->foreign('klantnr_fk')->references('klantnr')->on('klant')->onDelete('cascade');
        });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('betalingen');
     }
}
