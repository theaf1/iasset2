<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetworkConnection extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Client
    public function client ()
    {
        return $this->hasMany(Client::class,'lan_type_id');
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function NetworkConnectionServer ()
    {
        return $this->hasMany(Servers::class,'lan_type_id');
    }

}
