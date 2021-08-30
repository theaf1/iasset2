<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LooseDisplay;

class LooseDisplaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LooseDisplay::class,5)->create();
    }
}
