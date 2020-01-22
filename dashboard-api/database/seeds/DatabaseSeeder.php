<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            ExercisesTableSeeder::class,
            CoachHasTraineesTableSeeder::class,
            RegimesTableSeeder::class,
        ]);
    }
}
