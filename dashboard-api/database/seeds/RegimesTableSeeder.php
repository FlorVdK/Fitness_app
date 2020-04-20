<?php

use Illuminate\Database\Seeder;

class RegimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $regimes = factory(App\Regime::class, 50)->create();
    }
}
