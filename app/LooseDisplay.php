<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LooseDisplay extends Model
{
    protected $fillable = [
        'display_sapid',
        'display_pid',
        'year',
        'location_id',
        'section_id',
        'response_person',
        'position_id',
        'tel_no',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'serial_no',
        'display_size',
        'display_ratio_id',
    ];
}
