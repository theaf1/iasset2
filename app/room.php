<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'location_id',
        'name'
    ];
    //import ข้อมูลจาก file CSV
    public static function loadData($fileName){
        $roomRecords = loadCSV($fileName);
        foreach($roomRecords as $roomRecord){
            Room::create($roomRecord);
        }
    }
    //แสดงความสัมพันธ์กับตาราง Location
    public function location() {
        return $this->belongsTo(Location::class);
    }
    //แสดงความสัมพันธ์กับตาราง Client
    public function RoomClient () {
        return $this->hasMany(Client::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function RoomPeripherals () {
        return $this->hasMany(Peripherals::class,'location_id');
    }
}
