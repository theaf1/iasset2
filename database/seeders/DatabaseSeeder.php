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
            ClientSeeder::class, //Seed ตาราง Display และ Client
            PeripheralSeeder::class, //Seed ตาราง Peripherals
            StorageperipheralSeeder::class, //Seed ตาราง Storageperipherals
            NetworkDeviceSeeder::class, //Seed ตาราง Storageperipherals
            ServerSeeder::class, //seed ตาราง Servers
            NetworkedStorageSeeder::class, //seed ตาราง NetworkedStorage
            UpsSeeder::class, //seed ตาราง Upses 
        ]); 
    }
}
