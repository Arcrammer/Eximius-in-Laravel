<?php

use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('blog_posts')->insert([[
      'title' => 'Eximius just moved to New York!',
      'body_filename' => 'd426e4451c4d41d95f176835f2ec25f1.html',
      'header_image_filename' => 'bcb3d94f4c3d2ab38f9aa4ff394b7687.jpeg',
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ], [
      'title' => 'Version 2.0 will release soon!',
      'body_filename' => 'd426e4451c4d41d95f176835f2ec25f1.html',
      'header_image_filename' => '8f4a851338810c8eb5e10342ad83eced.jpg',
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ], [
      'title' => 'Saturday Meet-up in SoHo',
      'body_filename' => 'd426e4451c4d41d95f176835f2ec25f1.html',
      'header_image_filename' => '16a9478876aec395e1f507d9a49888b2.jpg',
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ], [
      'title' => 'Employers, the time you\'ve been waiting for is here!',
      'body_filename' => 'd426e4451c4d41d95f176835f2ec25f1.html',
      'header_image_filename' => '8d9987fb4a39f5ce077893e10844207e.jpg',
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ], [
      'title' => 'Why wait for later? Start looking for jobs now!',
      'body_filename' => 'd426e4451c4d41d95f176835f2ec25f1.html',
      'header_image_filename' => '35ad28564f2bc529e62c3f6aa0650241.jpg',
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ], ]);
  }
}
