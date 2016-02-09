<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'username' => $faker->word
    ];
});

$factory->define(App\Video::class, function (Faker\Generator $faker) {
  $title = $faker->sentence;
  $slug = str_replace(' ', '-', $title) . '-' . '1';
	return [
		'title' => $title,
		'category' => $faker->word,
		'description' => $faker->paragraph,
		'url' => $faker->url,
		'user_id' => 0,
    'slug' => $slug
	];
});

$factory->define(App\Message::class, function (Faker\Generator $faker) {
  return [
    'sender_name' => $faker->name,
    'email' => $faker->email,
    'subject' => $faker->sentence,
    'message' => $faker->paragraph,
    'reciever_id' => 1
  ];
});
