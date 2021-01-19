<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Servers;
use Faker\Generator as Faker;

$factory->define(Servers::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999),
        'pid' => '12240001-D-7440-001-0001/64',
        'location_id' => 44,
        'section_id' => 1,
        'mobility_id' => 2,
        'tel_no' => '9-7043#108',
        'response_person' => $faker->firstNameFemale,
        'owner_id' => 1,
        'asset_status_id' => 3,
        'asset_use_status_id' => 2,
        'brand' => 'Brand',
        'model' => 'Model',
        'serial_no' => 'test',
        'form_factor_id' => 2,
        'cpu_model' => 'Xeon E5-2215',
        'cpu_speed' => 2.5,
        'cpu_socket_no' => 2,
        'ram_size' => 64,
        'is_raid' => 1,
        'no_of_physical_drive_max' => 8,
        'no_of_physical_drive_populated'=> 5,
        'lun_count' => 2,
        'data_unit_id'=>2,
        'hdd_total_cap'=> 6,
        'os_id' => 6,
        'os_arch' => 1,
        'role_class_id' => 2,
        'is_ad' => 0,
        'is_dns' => 0,
        'is_dhcp'=> 0,
        'is_fileshare' =>0,
        'is_web' => 1,
        'is_db' => 1,
        'is_log' => 0,
        'other_software' => 0,
        'other_software_detail' => null,
        'lan_type_id' => 5,
        'lan_outlet_no' => 'U8-8888',
        'ip_address' => $faker->localIpv4,
        'mac_address' => $faker->macAddress,
        'computer_name' => $faker->numerify('SIMEDSRV##'),
        'issues' => 'test',
        'remarks' => 'FAKE DATA Not for production',
    ];
});
