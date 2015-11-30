<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $businesses = [
      'Ullmannite',
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
    foreach ($businesses as $business) {
      DB::table('businesses')->insert([
        'business' => $business
      ]);
    }
  }
}
