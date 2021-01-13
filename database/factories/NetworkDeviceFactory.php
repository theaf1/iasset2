<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Asset_statuses;
use App\Asset_use_statuses;
use App\Section;
use App\NetSubtype;
use App\Owner;
use App\Mobility;
use App\Networkdevices;
use Faker\Generator as Faker;

$factory->define(Networkdevices::class, function (Faker $faker) {
    return [
        'sapid' => rand(131100000000,131100099999),
        'pid' => '1224H001-S-7440-001-0001/64',
        'location_id' => 44,
        'mobility_id' => 2,
        'section_id' => 1,
        'tel_no'=>'9-7043#107',
        'response_person' => 'PP',
        'owner_id' => 1,
        'asset_status_id' => 3,
        'asset_use_status_id' => 2,
        'device_subtype_id' => 2,
        'brand' => 'Brand',
        'model' => 'Model',
        'serial_no' => 'test',
        'port_count'=> rand(1,48),
        'is_modular' => 0,
        'psu_count' => 1,
        'device_management_address' => $faker->localIpv4,
        'software_version' => '1A',
        'issues' => 'test',
        'remarks' => 'Fake Data NOT FOR PRODUCTION',
    ];
});
