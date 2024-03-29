<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Todo::class, function (Faker $faker) {
	return [
		//
		'name' => $faker->sentence(3),
		'description' => $faker->paragraph(4),
		'completed' => false,
		'recurring' => false,
		'started_at' => now(),
		'done_at' => now(),
	];
});
