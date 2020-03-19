<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servers extends Model
{
    protected $fillable = [
        'id',
        'sapid',
        'pid',
        'location_id',
        'section',
        'is_mobile',
        'tel_no',
        'response_person',
        'owner',
        'asset_status',
        'asset_use_status',
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
        'hdd_total_cap',
        'display_no',
        'is_headless',
        'display_sapid',
        'display_pid',
        'os',
        'os_arch',
        'role_class',
        'is_ad',
        'is_dns',
        'is_dhcp',
        'is_fileshare',
        'is_web',
        'is_db',
        'is_log',
        'other_software',
        'other_software_detail',
        'lan_type',
        'lan_outlet_no',
        'ip_address',
        'mac_address',
        'computer_name',
        'issues',
        'remarks',
    ];
    public function location ()
    {
        return $this->hasOne(location::class);
    }
    public function section ()
    {
        return $this->hasOne(Section::class);
    }
    public function assetstatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    public function assetusestatus ()
    {
        $this->hasOne(Asset_use_statuses::class);
    }
}
