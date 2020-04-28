<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storageperipherals extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'is_mobile',
        'section',
        'user',
        'tel_no',
        'function',
        'owner',
        'asset_status',
        'asset_use_status',
        'remarks',
        'brand',
        'model',
        'serial_no',
        'connectivity',
        'is_hotswap',
        'data_unit',
        'total_capacity',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'issues',
    ];
    //แสดงความสัมพันธ์กับตาราง Section
    public function section ()
    {
       return $this-hasOne(Section::class);
    }
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function StoragePeripheralOwner ()
    {
        return $this->belongsTo(Owner::class,'owner');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function StoragePeripheralAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function StoragePeripheralAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status');
    }
}
