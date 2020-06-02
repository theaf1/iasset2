<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiuser extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function MultiUserClient ()
    {
        return $this->hasMany(Client::class,'multi_user_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripheral
    public function MultiUserPeripheral ()
    {
        return $this->hasMany(Peripheral::class);
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function MultiUserStoragePeripheral ()
    {
        return $this->hasMany(Storageperipherals::class);
    }
}
