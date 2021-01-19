<?php

use Illuminate\Database\Seeder;

class StorageperipheralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Storageperipherals::class,2)->create(); //เรียก StoragePripheralFactory
    }
}
