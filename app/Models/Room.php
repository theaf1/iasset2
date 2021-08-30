<?php

namespace App\Models;

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
        return $this->belongsTo(Location::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Client
    public function RoomClient () {
        return $this->hasMany(Client::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function RoomPeripherals () {
        return $this->hasMany(Peripherals::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function RoomStoragePeripheral ()
    {
        return $this->hasMany(Storageperipherals::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function RoomServer ()
    {
        return $this->hasMany(Servers::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function RoomNetworkDevice ()
    {
        return $this->hasMany(Networkdevices::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkedstorage
    public function RoomNetworkedStorage ()
    {
        return $this->hasMany(NetworkedStorage::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function RoomUps ()
    {
        return $this->hasMany(Upses::class,'location_id');
    }
    //แสดงความสัมพันธ์กับตาราง LooseDisplay
    public function RoomLooseDisplay ()
    {
        return $this->hasMany(LooseDisplay::class,'location_id');
    }
}
