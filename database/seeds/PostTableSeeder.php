<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	DB::table('posts')->truncate();
    	for ($i = 0; $i < 100; $i++) {
    		 Post::create([
	        	'title' => $faker->sentence,
	        	'image_url' => $faker->imageUrl($width = 640, $height = 480),
	        	'content' => $faker->paragraph,
	        	'user_id' => '1',
	        ]);
    	}       
    }
}
