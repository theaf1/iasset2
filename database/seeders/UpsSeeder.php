<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Upses;

class UpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //เรียก factory ที่เกี่ยวข้อง
    {
        factory(Upses::class,1)->create();
    }
}
