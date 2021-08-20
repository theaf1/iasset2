<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NetworkedStorage;

class NetworkedStorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(NetworkedStorage::class,1)->create();
    }
}
