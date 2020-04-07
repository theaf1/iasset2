<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'building_id',
        'floor',
        'wing'
    ];
    //import ข้อมูล location จาก file CSV
    public static function loadData($fileName){
        $locationRecords = loadCSV($fileName);
        foreach($locationRecords as $locationRecord){
            Location::create($locationRecord);
        }
    }
    //แสดงความสัมพันธ์กับตาราง Building
    public function building() {
        return $this->belongsTo(Building::class);
    }
}
