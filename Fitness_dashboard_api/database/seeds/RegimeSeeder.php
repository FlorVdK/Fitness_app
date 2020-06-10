<?php

use Illuminate\Database\Seeder;

class RegimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $regimes = factory(App\Regime::class, 100)->create();
    }
}
