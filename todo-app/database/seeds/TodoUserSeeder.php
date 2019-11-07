<?php

use App\User;
use Illuminate\Database\Seeder;

class TodoUserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		factory(User::class, 5)->create();
	}
}
