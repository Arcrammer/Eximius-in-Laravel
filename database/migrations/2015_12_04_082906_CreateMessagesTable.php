<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('messages', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('from')->unsigned();
      $table->integer('to')->unsigned();
      $table->string('subject');
      $table->string('body_filename');
      $table->softDeletes();
      $table->timestamps();

      // Foreign Keys
      $table->foreign('from')
        ->references('id')
        ->on('users');
      $table->foreign('to')
        ->references('id')
        ->on('users');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('messages');
    $message_bodies = glob(base_path().'/resources/message_bodies/*');
    foreach ($message_bodies as $message_body) {
      unlink($message_body);
    }
  }
}
