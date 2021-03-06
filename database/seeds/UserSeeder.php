<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([[
      'username' => 'iAlexander',
      'email' => 'Alexander2475914@gmail.com',
      'password' => bcrypt('secret'),
      'is_employer' => 1,
      'is_seeker' => 1
    ], [
      'username' => 'Arcrammer',
      'email' => 'Arcrammer@me.com',
      'password' => bcrypt('secret'),
      'is_employer' => 1,
      'is_seeker' => 1
    ], [
      'username' => 'cdtdesign',
      'email' => 'chris@cdtdesign.com',
      'password' => bcrypt('secret'),
      'is_employer' => 1,
      'is_seeker' => 1
    ]]);
  }
}
