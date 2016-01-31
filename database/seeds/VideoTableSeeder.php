<?php

use Illuminate\Database\Seeder;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Video::class, 10)->create(
        [
        	'user_id' => 1,
        	'url' => 'https://www.youtube.com/watch?v=ULjwrS6ajYk',
        ]);

    }
}
