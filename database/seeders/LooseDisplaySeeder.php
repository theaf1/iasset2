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
    public function run() //เรียก factory ที่เกี่ยวข้อง
    {
        factory(LooseDisplay::class,5)->create();
    }
}
