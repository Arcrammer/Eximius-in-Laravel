<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('location');
          $table->bigInteger('business')
            ->references('id')
            ->on('businesses');
          $table->string('title');
          $table->string('body_filename');
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
        Schema::drop('listings');
    }
}
