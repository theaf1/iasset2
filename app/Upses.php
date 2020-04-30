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
        'section_id',
        'tel_no',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
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
    public function UpsSection ()
    {
        $this->belongsTo(Section::class);
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function UpsOwner ()
    {
        return $this->belongs(Owner::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function UpsAssetStatus ()
    {
        $this->belongsTo(Asset_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function UpsAssetUseStatus ()
    {
        $this->belongsTo(Asset_use_statuses::class);
    }
}
