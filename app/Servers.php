<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'section_id',
        'mobility_id',
        'tel_no',
        'response_person',
        'owner_id',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'form_factor',
        'serial_no',
        'cpu_model',
        'cpu_speed',
        'cpu_socket_no',
        'ram_size',
        'is_raid',
        'no_of_physical_drive_max',
        'no_of_physical_drive_populated',
        'lun_count',
        'data_unit',
        'hdd_total_cap',
        'display_no',
        'is_headless',
        'display_sapid',
        'display_pid',
        'os_id',
        'os_arch',
        'role_class_id',
        'is_ad',
        'is_dns',
        'is_dhcp',
        'is_fileshare',
        'is_web',
        'is_db',
        'is_log',
        'other_software',
        'other_software_detail',
        'lan_type_id',
        'lan_outlet_no',
        'ip_address',
        'mac_address',
        'computer_name',
        'issues',
        'remarks',
    ];
    //แสดงความสัมพันธ์กับตาราง Location
    public function location ()
    {
        return $this->hasOne(location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Section
    public function ServerSection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Mobility
    public function ServerMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Owner
    public function ServerOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function ServerAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function ServerAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง ServerRoleClass
    public function ServerRoleClass ()
    {
        return $this->belongsTo(ServerRoleClass::class,'role_class_id');
    }
    //แสดงความสัมพันธ์กับตาราง ServerOS
    public function ServerOs ()
    {
        return $this->belongsTo(ServerOS::class,'os_id');
    }
    //แสดงความสัมพันธ์กับตาราง NetworkConnection
    public function ServerNetworkConnection ()
    {
        return $this->belongsTo(NetworkConnection::class,'lan_type_id');
    }
}
