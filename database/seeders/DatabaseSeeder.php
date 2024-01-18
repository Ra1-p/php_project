<?php

namespace Database\Seeders;

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory(5)->create();

        $profiles = Profile::factory(5)->make(['user_id' => null])->each(function ($profile, $index) use ($users) {
            $profile->user_id = $users[$index]->id;
        });

        Profile::query()->insert($profiles->toArray());
    }
}
