<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetworkedStorage extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
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
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function section ()
    {
        return $this->hasOne(Section::class);
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function owner ()
    {
        return $this->hasOne(Owner::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function assetStatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function assetUseStatus ()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
}
