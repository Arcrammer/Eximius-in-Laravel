<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    $this->call(BlogPostSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(BusinessSeeder::class);
    $this->call(ListingSeeder::class);
    $this->call(MessageSeeder::class);
    Model::reguard();
  }
}
