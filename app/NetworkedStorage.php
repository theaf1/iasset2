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
        'mobility_id',
        'section_id',
        'tel_no',
        'response_person',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'type',
        'brand',
        'model',
        'serial_no',
        'data_unit',
        'hdd_total_cap',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'device_name',
        'device_management_address',
        'device_communication_address',
        'is_smb',
        'is_fc',
        'is_iscsi',
        'remarks',
        'issues',
    ];
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function NetworkedStorageSection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function NetworkedStorageMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function NetworkedStorageOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function NetworkedStorageAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function NetworkedStorageAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
}
