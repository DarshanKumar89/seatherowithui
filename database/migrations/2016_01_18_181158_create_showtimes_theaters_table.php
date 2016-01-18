<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowtimesTheatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimes_theaters', function (Blueprint $table) {
            $table->increments('theater_id');
            $table->string('name');
            $table->decimal('lat',10,8);
            $table->decimal('lon',11,8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('showtimes_theaters');
    }
}
