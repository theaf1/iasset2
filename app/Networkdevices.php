<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Networkdevices extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
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
    public function assetstatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function assetusestatus()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง NetSubtype
    public function netsubtype ()
    {
        return $this->hasOne(NetSubtype::class);
    }
}
