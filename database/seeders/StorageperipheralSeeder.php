<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Storageperipherals;

class StorageperipheralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Storageperipherals::class,2)->create(); //เรียก StoragePripheralFactory
    }
}