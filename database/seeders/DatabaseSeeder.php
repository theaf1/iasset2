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
        // $this->call(UsersTableSeeder::class); 
        $this->call(ClientSeeder::class); //Seed ตาราง Display และ Client
        $this->call(PeripheralSeeder::class); //Seed ตาราง Peripherals
        $this->call(StorageperipheralSeeder::class); //Seed ตาราง Storageperipherals
        $this->call(NetworkDeviceSeeder::class); //seed ตาราง Networkdevice
        $this->call(ServerSeeder::class); //seed ตาราง Servers
        $this->call(NetworkedStorageSeeder::class); //seed ตาราง NetworkedStorage
        $this->call(UpsSeeder::class); //seed ตาราง Upses 
    }
}
