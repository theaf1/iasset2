<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\NetworkedStorage;
use Faker\Generator as Faker;

$factory->define(NetworkedStorage::class, function (Faker $faker) {
    return [
        'sapid',
        'pid',
        'location_id',
        'mobility_id',
        'section_id',
        'tel_no',
        'response_person',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'storage_type_id',
        'brand',
        'model',
        'serial_no',
        'data_unit_id',
        'hdd_total_cap',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'device_name',
        'device_management_address',
        'device_communication_address',
        'is_smb',
        'is_fc',
        'is_iscsi',
        'remarks',
        'issues',
    ];
});
