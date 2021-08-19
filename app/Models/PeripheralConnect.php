<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeripheralConnect extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function ConnectPeripheral ()
    {
        return $this->hasMany(Peripherals::class,'connectivity_id');
    }
}
