<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset_use_statuses extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function peripherals ()
    {
        return $this->belongsTo(Peripherals::class);
    }
    //แสดงความสัมพันธ์กับตาราง Storageperipherals
    public function storageperipherals ()
    {
        return $this->belongsTo(Storageperipherals::class);
    }
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function networkdevices ()
    {
        return $this->belongsTo(Networkdevices::class);
    }
    //แสดงความสัมพันธ์กับตาราง Networkedstorage
    public function networkedstorage ()
    {
        return $this->belongsTo(NetworkedStorage::class);
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function servers ()
    {
        return $this->belongsTo(Servers::class);
    }
    //แสดงความสัมพันธ์กับตาราง Upses
    public function upses ()
    {
        return $this->belongsTo(Upses::class);
    }
}
