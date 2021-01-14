<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'type_id'=> factory(App\Clienttype::class),
        'sapid' => rand(131100000000,131100099999),
        'pid'=> '1224H001-S-7440-001-0001/64',
        'location_id'=> factory(App\Location::class),
        'mobility_id'=> factory(App\Mobility::class),
        'section_id'=> factory(App\Section::class),
        'user'=> $faker->name,
        'position_id'=> factory(App\Position::class),
        'function_id'=>factory(App\Opsfunction::class),
        'owner_id'=>factory(App\Owner::class),
        'tel_no' => '9-9999',
        'permission' => 1,
        'asset_status_id'=>factory(App\Asset_statuses::class),
        'asset_use_status_id'=>factory(App\Asset_use_statuses::class),
        'remarks'=> 'TEST DATA NOT FOR PRODUCTION',
        'brand'=> 'FELL',
        'model'=> 'Not-so-bright1',
        'serial_no'=>'test',
        'cpu_model' => 'Core i5-1025G7',
        'cpu_speed' => 2.5,
        'cpu_socket_number'=>1,
        'ram_size'=> 8,
        'hdd_no' => 1,
        'data_unit_id'=> factory(App\DataUnit::class),
        'hdd_total_cap'=> 2,
        'other_software_detail'=> '',
        'lan_outlet_no' => '',
        'ip_address' => $faker->localIpv4,
        'mac_address'=> $faker->macAddress,
        'lan_type_id'=>'',
        'computer_name'=>'computer',
        'is_wireless' => 0,
        'issues' => 'test',
    ];
});
