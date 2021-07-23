<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LooseDisplay extends Model
{
    protected $fillable = [
        'display_sapid',
        'display_pid',
        'year',
        'owner_id',
        'location_id',
        'section_id',
        'response_person',
        'position_id',
        'tel_no',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'serial_no',
        'display_size',
        'display_ratio_id',
        'is_vga',
        'is_dvi',
        'is_hdmi',
        'is_dp',
        'issues',
        'remarks',

    ];
    public function LooseDisplayOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    public function LooseDisplayRoom ()
    {
        return $this->belongsTo(Room::class,'location_id');
    }
    public function LooseDisplaySection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function LooseDisplayPosition ()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
    public function LoosedisplayAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    public function LoosedisplayAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
    public function LooseDisplayRatio ()
    {
        return $this->belongsTo(DisplayRatio::class,'display_ratio_id');
    }
}
