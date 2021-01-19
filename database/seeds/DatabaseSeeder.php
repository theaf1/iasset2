<?php

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
        $this->call(StorageperipheralSeeder::class); //Seed ตาราง Storageperipherals
        $this->call(NetworkDeviceSeeder::class); //seed ตาราง Networkdevice
        $this->call(NetworkedStorageSeeder::class);
        $this->call(UpsSeeder::class); //seed ตาราง Upses 
    }
}
