<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeripheralSupply extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function SupplyPeripheral ()
    {
        return $this->hasMany(Peripheral::class);
    }
}
