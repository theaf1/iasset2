<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Networkdevices extends Model
{
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'is_mobile',
        'section',
        'tel_no',
        'response_person',
        'owner',
        'section',
        'asset_status',
        'asset_use_status',
        'device_subtype',
        'brand',
        'model',
        'serial_no',
        'port_count',
        'psu_count',
        'device_management_address',
        'software_version',
        'issues',
        'remarks',
    ];
    public function gettype(){
        $this->belongsTo(location::class);
        $this->belongsTo(section::class);
        $this->hasOne(Asset_statuses::class);
        $this->hasOne(Asset_use_statuses::class);
    }
}
