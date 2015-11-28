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
    $possibleLocations = [
      'Chelsea, Manhattan',
      'Williamsburg, Brooklyn',
      'SoHo, Manhattan',
      'Upper East Side, Manhattan',
      'Red Hook, Brooklyn',
      'Kips Bay, Manhattan',
      'Astoria, Queens',
      'Midtown, Manhattan'
    ];
    $possibleTitleIntros = [
      'Urgent Need of',
      'Start-up Looking for',
      'Local Studio Needs',
      'Large Team Looking for'
    ];
    $possiblePositions = [
      // 'Urgent Need of...'
      //
      // Please use Title Case (that
      // doesn't mean to capitalise
      // each word)
      //
      'an iOS Architect',
      'an Android Engineer',
      'a C++ Developer',
      'a Database Administrator',
      'a Java Programmer',
      'a Ruby Developer',
      'a PHP Developer',
      'a Python Engineer'
    ];
    for ($i=0; $i <= 100; $i++) {
      array_push($listings, [
        'title' => $possibleTitleIntros[array_rand($possibleTitleIntros)] . ' ' . $possiblePositions[array_rand($possiblePositions)],
        'body_filename' => md5(uniqid(rand(), true)) . '.html',
        'location' => $possibleLocations[array_rand($possibleLocations)],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ]);
    }
    DB::table('listings')->insert($listings);
  }
}
