<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peripherals;

class PeripheralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Peripherals::class,50)->create();
    }
}
