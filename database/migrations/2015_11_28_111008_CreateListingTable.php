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
          // Columns
          $table->increments('id')->unsigned();
          $table->string('title');
          $table->string('location');
          $table->integer('business_id')->unsigned();
          $table->string('body_filename');
          $table->timestamps();

          // Foreign Keys
          $table->foreign('business_id')
            ->references('id')
            ->on('businesses');
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
