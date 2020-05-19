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
        'mobility_id',
        'section_id',
        'user',
        'tel_no',
        'function',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
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
       return $this-belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function StorageperipheralMobility()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function StoragePeripheralOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function StoragePeripheralAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function StoragePeripheralAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
}
