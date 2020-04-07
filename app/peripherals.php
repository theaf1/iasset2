<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peripherals extends Model
{
    //column ที่สามารถเพิ่มหรือแก้ไขข้อมูล
    protected $fillable =[
        'type',
        'id',
        'sapid',
        'pid',
        'location_id',
        'is_mobile',
        'user',
        'position',
        'section',
        'tel_no',
        'function',
        'owner',
        'asset_status',
        'asset_use_status',
        'remarks',
        'brand',
        'model',
        'serial_no',
        'supply_consumables',
        'connectivity',
        'ip_address',
        'lan_outlet_no',
        'is_shared',
        'share_name',
        'share_method',
        'issues',
    ];
    //แสดงความสัมพันธ์กับตาราง Peripheraltype
    public function peripheraltype ()
    {
        return $this->hasOne(Peripheraltype::class);
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
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function assetstatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function assetusestatus ()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
    
}
