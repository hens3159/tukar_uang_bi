<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PenukaranUangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penukaran_uang', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('customer_id')->unsigned();
          $table->integer('money_id')->unsigned();
          $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
          $table->foreign('money_id')->references('id')->on('moneys')->onDelete('cascade');
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
        Schema::dropIfExists('penukaran_uang');
    }
}
