<?php

use Illuminate\Database\Seeder;
use App\Networkdevices;
class NetworkDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Networkdevices::class,5)->create();
    }
}
