<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $possibleSubjects = [
      'Welcome to the Best Monday Ever!',
      'Test of the Week: Does Button Color Matter on Mobile?',
      'Why You Need to Be Awkward at Work',
      'Enjoy this Special Offer at Our New Location',
      '25-40% off – Email-Only Offer – Today Only',
      'You’re Invited! New Product Launch Party at Ullmannite',
      'Last chance to get 50% off!',
      'Want 20% off your next order?'
    ];

    // Determine a random time
    $earliestCreationDate =  time() - 60 * 60 * 24 * 7 * 3;
    $creationOfThisMessage = mt_rand($earliestCreationDate, time());

    $messages = [];
    for ($i=0; $i < 100; $i++) {
      array_push($messages, [
        'from' => rand(1, 2),
        'to' => rand(1, 2),
        'subject' => $possibleSubjects[array_rand($possibleSubjects)],
        'body_filename' => md5(uniqid(rand(), true)).'.html',
        'created_at' => date('Y-m-d H:i:s', $creationOfThisMessage),
        'updated_at' => date('Y-m-d H:i:s', $creationOfThisMessage)
      ]);

      // Write descriptions to each of them from 'MessageBodies.php'
      $bodyDocument = fopen(base_path().'/resources/message_bodies/'.$messages[$i]['body_filename'], 'w+');
      fwrite($bodyDocument, file_get_contents(base_path().'/database/seeds/MessageBodies.php'));
      fclose($bodyDocument);
    }
    DB::table('messages')->insert($messages);
  }
}
