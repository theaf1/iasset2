<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    //แสดงความสัมพันธ์กับตาราง Client
    public function PositionClient ()
    {
        return $this->hasMany(Client::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripheral
    public function PositionPeripheral ()
    {
        return $this->hasMany(Peripheral::class);
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipheral
    public function PositionStoragePeripherals ()
    {
        return $this->hasMany(Storageperipherals::class);
    }
}
