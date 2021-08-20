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
        $this->call(ClientSeeder::class)->create(); //Seed ตาราง Display และ Client
        $this->call(PeripheralSeeder::class)->create(); //Seed ตาราง Peripherals
        $this->call(StorageperipheralSeeder::class)->create(); //Seed ตาราง Storageperipherals
        $this->call(NetworkDeviceSeeder::class)->create(); //Seed ตาราง Storageperipherals
        $this->call(ServerSeeder::class)->create(); //seed ตาราง Servers
        $this->call(NetworkedStorageSeeder::class)->create(); //seed ตาราง NetworkedStorage
        $this->call(UpsSeeder::class)->create(); //seed ตาราง Upses 
    }
}
