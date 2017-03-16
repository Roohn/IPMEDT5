<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBestellingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bestelling', function (Blueprint $table) {
          $table->engine = 'InnoDB';
          $table->increments('id');
          $table->integer('bestellingnr_fk')->unsigned();
          $table->integer('productcode_fk')->unsigned();
          $table->rememberToken();
          $table->timestamps();
      });
      Schema::table('bestelling', function(Blueprint $table)
       {
           $table->foreign('bestellingnr_fk')->references('bestellingnr')->on('bestellingen')->onDelete('cascade');
           $table->foreign('productcode_fk')->references('productcode')->on('producten');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestelling');
    }
}
