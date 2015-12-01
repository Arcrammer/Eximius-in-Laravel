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
    $possibleBusinessNames = [
      'T5 Labs',
      'Expa',
      'The New York Times',
      'Wall Street Journal',
      'Meetup',
      'Amazon, Inc.',
      'Blue Apron',
      'Audible, Inc.',
      'Condé Nast',
      'Shutterfly',
      'Adobe',
      'Smith & Keller',
      'TIME Magazine',
      'Grid'
    ];
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
    for ($i=0; $i < 135; $i++) {
      /**
       * Laravels' pagination implementation is
       * a little busted, to say the least.
       *
       * Sticking to 135 listings means nine
       * pages will be filled, but no more.
       */

      // Determine a random time
      $earliestCreationDate = date('Y-m-d H:i:s', time()) - 60 * 60 * 24 * 7 * 2;

      // Add it to the array
      array_push($listings, [
        'title' => $possibleTitleIntros[array_rand($possibleTitleIntros)] . ' ' . $possiblePositions[array_rand($possiblePositions)],
        'body_filename' => md5(uniqid(rand(), true)) . '.html',
        'business_id' => rand(1, count($possibleBusinessNames)),
        'location' => $possibleLocations[array_rand($possibleLocations)],
        'created_at' => date('Y-m-d H:i:s', rand(time($earliestCreationDate), time())),
        'updated_at' => date('Y-m-d H:i:s', rand(time($earliestCreationDate), time()))
      ]);

      // Write descriptions to each of them from 'ListingBodies.php'
      $bodyDocument = fopen(base_path().'/public/assets/listing_bodies/'.$listings[$i]['body_filename'], 'w+');
      fwrite($bodyDocument, file_get_contents(base_path().'/database/seeds/ListingBodies.php'));
      fclose($bodyDocument);
    }
    DB::table('listings')->insert($listings);
  }
}
