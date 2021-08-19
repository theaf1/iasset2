<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NetworkedStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\NetworkedStorage::class,1)->create();
    }
}
