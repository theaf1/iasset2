<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Peripherals;
use Faker\Generator as Faker;

$factory->define(Peripherals::class, function (Faker $faker) {
    return [
        'type_id',
        'sapid',
        'pid'=>'',
        'location_id',
        'mobility_id',
        'multi_user_id',
        'user' => $faker->name,
        'position_id',
        'section_id',
        'tel_no',
        'function',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'remarks' => 'FAKE DATA NOT FOR PRODUCTION',
        'brand',
        'model',
        'serial_no',
        'supply_consumables',
        'connectivity',
        'ip_address',
        'lan_outlet_no',
        'is_shared',
        'share_name',
        'share_method',
        'issues',
    ];
});
