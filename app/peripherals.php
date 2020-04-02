<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peripherals extends Model
{
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
    public function peripheraltype ()
    {
        return $this->hasOne(Peripheraltype::class);
    }
    public function section ()
    {
        return $this->hasOne(Section::class);
    }
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    public function assetstatus ()
    {
        return $this->hasOne(Asset_statuses::class);
    }
    public function assetusestatus ()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
    
}
