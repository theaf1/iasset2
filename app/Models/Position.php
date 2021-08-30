<?php

namespace App\Models;

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
        return $this->hasMany(Peripherals::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipheral
    public function PositionStoragePeripherals ()
    {
        return $this->hasMany(Storageperipherals::class,'position_id');
    }
    //แสดงความสัมพันธ์กับตาราง LooseDisplay
    public function PositionLoosedisplay ()
    {
        return $this->hasMany(LooseDisplay::class,'position_id');
    }
}
