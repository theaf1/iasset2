<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() //เรียก seeder ที่ต้องใช้งาน
    {
        $this->call([
            #UpsSeederNew::class,
            ClientSeeder::class,
            PeripheralSeeder::class,
            StorageperipheralSeeder::class,
            NetworkDeviceSeeder::class,
            ServerSeeder::class,
            NetworkedStorageSeeder::class,
            UpsSeeder::class,
            LoosedisplaySeeder::class,
        ]);
    }
}
