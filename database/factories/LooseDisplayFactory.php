<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LooseDisplay;
use Faker\Generator as Faker;

$factory->define(LooseDisplay::class, function (Faker $faker) {

    return [
        'sapid' => rand(131100000000,131100099999),
        'pid' => '1224H001-7440-001-0001/64',
        'owner_id'=> 2,
        'location_id' => 8,
        'section_id' => 1,
        'response_person' => $faker->name,
        'position_id' => 3,
        'tel_no' => '9-7767#108',
        'asset_status_id' => 3,
        'asset_use_status_id' => 2,
        'brand' => 'brand',
        'model' => 'model',
        'serial_no' => $faker->bothify('test-####'),
        'display_type_id' => 2,
        'display_size'=> 27,
        'display_ratio_id' =>3,
        'is_vga' => $faker->boolean,
        'is_dvi'=> $faker->boolean,
        'is_hdmi' => $faker->boolean,
        'is_dp' => $faker->boolean,
        'issues'=>'test',
        'remarks'=> 'FAKE DATA NOT FOR PRODUCTION',
    ];
});