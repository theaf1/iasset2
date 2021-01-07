<?php

use Illuminate\Database\Seeder;

class UpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Upses::class,1)->create();
    }
}
