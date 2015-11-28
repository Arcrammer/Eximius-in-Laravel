<?php
use Illuminate\Database\Seeder;

use Eximius\Listing;

class ListingSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $listings = [];
    for ($i=0; $i <= 10; $i++) {
      array_push($listings, [
        'title' => "Urgent Need for a Developer #{$i}",
        'body_filename' => md5(uniqid(rand(), true)) . '.html',
        'location' => 'Chelsea, Manhattan',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ]);
    }
    \Log::debug($listings);
    DB::table('listings')->insert($listings);
  }
}
