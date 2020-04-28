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
        return $this->belongsTo(Peripheraltype::class,'type');
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function peripheralsection ()
    {
        return $this->belongsTo(Section::class,'section');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function peripheralowner ()
    {
        return $this->belongsTo(Owner::class,'owner');
    }
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function PeripheralAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function PeripheralAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status');
    }
    
}
