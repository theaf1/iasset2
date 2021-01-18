<?php

use Illuminate\Database\Seeder;

class UpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //เรียก factory ที่เกี่ยวข้อง
    {
        factory(App\Upses::class,1)->create();
    }
}
