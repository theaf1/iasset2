<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeripheralSupply extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    //แสดงความสัมพันธ์กับตาราง Peripherals 
    public function SupplyPeripheral ()
    {
        return $this->hasMany(Peripheral::class,'supply_consumables_id');
    }
}
