<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZipcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zipcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('zipcode',10);
            $table->decimal('lat',10,8);
            $table->decimal('lon',11,8);
            $table->string('countrycode',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('zipcodes');
    }
}
