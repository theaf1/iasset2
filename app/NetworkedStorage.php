<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetworkedStorage extends Model
{
    protected $fillable = [
        'sapid',
        'pid',
        'location_id',
        'is_mobile',
        'section',
        'tel_no',
        'response_person',
        'owner',
        'asset_status',
        'asset_use_status',
        'type',
        'brand',
        'model',
        'serial_no',
        'hdd_total_cap',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'device_name',
        'device_management_address',
        'device_communication_address',
        'device_communication_protocol',
        'remarks',
        'issues',
    ];

    public function section ()
    {
        return $this->hasOne(Section::class);
    }
    public function assetStatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    public function assetUseStatus ()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
}
