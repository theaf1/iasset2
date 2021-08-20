<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Networkdevices;
class NetworkDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //เรียก factoty ที่เกี่ยวข้อง
    {
        factory(Networkdevices::class,5)->create();
    }
}
