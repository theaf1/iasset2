<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobility extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function MobilityClient ()
    {
        return $this->hasMany(Client::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function MobilityPeripherals ()
    {
        return $this->hasMany(Peripherals::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function MobilityStoragePeripherals ()
    {
        return $this->hasMany(Storageperipherals::class,'mobility_id');
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function MobilityNetworkdevice ()
    {
        return $this->belongsTo(Networkdevices::class);
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function MobilityServer ()
    {
        $this->belongsTo(Servers::class);
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function MobilityNetworkedstorage ()
    {
        return $this->belongsTo(NetworkedStorage::class);
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function MobilityUps ()
    {
        return $this->BelongsTo(Upses::class);
    }
}
