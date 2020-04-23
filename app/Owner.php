<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูล
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->hasMany(Client::class,'owner');
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
    public function networkdevice ()
    {
        return $this->belongsTo(Networkdevices::class);
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function server ()
    {
        return $this->belongsTo(Servers::class);
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
