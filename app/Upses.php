<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upses extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'is_mobile',
        'response_person',
        'section',
        'tel_no',
        'owner',
        'asset_status',
        'asset_use_status',
        'brand',
        'model',
        'serial_no',
        'form_factor',
        'topology',
        'capacity',
        'is_modular',
        'battery_type',
        'has_external_battery',
        'device_management_address',
        'issues',
        'remarks',
    ];
    //แสดงความสัมพันธ์กับตาราง Section
    public function section ()
    {
        $this->hasOne(Section::class);
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function owner ()
    {
        return $this->hasOne(Owner::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function assetstatus ()
    {
        $this->hasOne(Asset_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function assetusestatus ()
    {
        $this->hasOne(Asset_use_statuses::class);
    }
}
