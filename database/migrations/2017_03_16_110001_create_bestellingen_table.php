<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestellingenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('bestellingen', function (Blueprint $table) {
           $table->engine = 'InnoDB';
           $table->increments('bestellingnr');
           $table->string('status');
           $table->DateTime('besteld_op');
           $table->integer('klantnr_fk')->unsigned();
           $table->rememberToken();
           $table->timestamps();
       });
       Schema::table('bestellingen', function(Blueprint $table)
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
         Schema::dropfExists('bestellingen');
     }
}
