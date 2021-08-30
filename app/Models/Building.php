<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
 // กำหนด column ที่สามารถเปลี่ยนแปลงข้อมูลได้
    protected $fillable = [
        'id',
        'name'
    ];
    
    //อ่าข้อมูลจากไฟล์ csv
    public static function loadData($fileName){
        $buildingRecords = loadCSV($fileName);
        foreach($buildingRecords as $buildingRecord){
            Building::create($buildingRecord);
        }
    }

    //แสดงความสัมพันธกับตาราง Location
    public function BuildingLocation () {
        return $this->hasMany(Location::class,'building_id');
    }
    
}
