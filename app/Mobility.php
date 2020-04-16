<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobility extends Model
{
    protected $fillable = [
        'id',
        'value',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        $this->belongsTo(Client::class);
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function peripherals ()
    {
        $this->belongsTo(Peripherals::class);
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function storageperipherals ()
    {
        $this->belongsTo(Storageperipherals::class);
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function networkdevice ()
    {
        $this->belongsTo(Networkdevices::class);
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function server ()
    {
        $this->belongsTo(Servers::class);
    }
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function networkedstorage ()
    {
        return $this->belongsTo(NetworkedStorage::class);
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function ups ()
    {
        return $this->BelongsTo(Upses::class);
    }
}
