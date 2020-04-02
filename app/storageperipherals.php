<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storageperipherals extends Model
{
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
    public function section ()
    {
       return $this-hasOne(Section::class);
    }
    public function location ()
    {
        return $this->hasOne(Location::class);
    }
    public function owner ()
    {
        return $this->hasOne(Owner::class);
    }
    public function assetstatus ()
    {
        return $this->hasOne(Asset_ststuses::class);
    }
    public function assetusestatus ()
    {
        return $this->hasOne(Asset_use_statuses::class);
    }
}
