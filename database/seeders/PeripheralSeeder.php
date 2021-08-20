<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Peripherals;

class PeripheralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Peripherals::class,50)->create();
    }
}
