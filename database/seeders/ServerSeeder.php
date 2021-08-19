<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servers;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Servers::class,5)->create();
    }
}
