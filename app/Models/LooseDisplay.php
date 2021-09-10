<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class LooseDisplay extends Model
{
    use HasFactory;
    use Searchable;
    //กำหนดค่าที่สามารถแก้ไขเปลี่ยนแปลงได้
    protected $fillable = [
        'sapid',
        'pid',
        'owner_id',
        'location_id',
        'mobility_id',
        'section_id',
        'response_person',
        'position_id',
        'tel_no',
        'asset_status_id',
        'asset_use_status_id',
        'brand',
        'model',
        'serial_no',
        'display_type_id',
        'display_size',
        'display_ratio_id',
        'is_vga',
        'is_dvi',
        'is_hdmi',
        'is_dp',
        'issues',
        'remarks',

    ];
    //กำหนความสัมพันธ์กับตาราง Owner
    public function LooseDisplayOwner ()
    {
        return $this->belongsTo(Owner::class,'owner_id');
    }
    //กำหนดความสัมพันธ์กับตาราง Room
    public function LooseDisplayRoom ()
    {
        return $this->belongsTo(Room::class,'location_id');
    }
    public function LooseDisplayMobility ()
    {
        return $this->belongsTo(Mobility::class,'mobility_id');
    }
    //กำหนดความสัมพันธ์กับตาราง Section
    public function LooseDisplaySection ()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    //แสดงความสัมพันธ์กับตาราง Position
    public function LooseDisplayPosition ()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_statuses
    public function LoosedisplayAssetStatus ()
    {
        return $this->belongsTo(Asset_statuses::class,'asset_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Asset_use_statuses
    public function LoosedisplayAssetUseStatus ()
    {
        return $this->belongsTo(Asset_use_statuses::class,'asset_use_status_id');
    }
    //แสดงความสัมพันธ์กับตาราง Displaytype
    public function LooseDisplayType ()
    {
        return $this->belongsTo(DisplayType::class,'display_type_id');
    }
    //แสดงความสัมพันธ์กับตาราง DisplayRatio
    public function LooseDisplayRatio ()
    {
        return $this->belongsTo(DisplayRatio::class,'display_ratio_id');
    }
}
