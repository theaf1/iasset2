<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Display;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Display::class,250)->create();
    }
}
