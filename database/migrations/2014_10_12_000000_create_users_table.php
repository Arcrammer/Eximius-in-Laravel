<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('is_employer');
            $table->boolean('is_seeker');
            $table->string('résumé_filename')->nullable();
            $table->string('selfie_filename')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
        $listing_bodies = glob(base_path().'/public/assets/listing_bodies/*');
        foreach ($listing_bodies as $listing_body) {
          unlink($listing_body);
        }
    }
}
