<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Networkdevices extends Model
{
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
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    public function section ()
    {
        return $this->hasOne(Section::class);
    }
    public function owner ()
    {
        return $this->hasOne(Owner::class);
    }
    public function assetstatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    public function assetusestatus()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
    public function netsubtype ()
    {
        return $this->hasOne(NetSubtype::class);
    }
}
