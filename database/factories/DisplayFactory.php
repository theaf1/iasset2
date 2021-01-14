<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Display;
use Faker\Generator as Faker;

$factory->define(Display::class, function (Faker $faker) {
    return [
        'client_id', //foreign key จาก ตาราง clients
        'display_sapid' => rand(180600000000,180600009999),
        'display_pid'=> '1224H001-S-7440-006-0002/64',
        'display_size' => 19,
        'display_ratio' =>'5:4',
    ];
});
