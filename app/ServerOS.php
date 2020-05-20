<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerOS extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable =[
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Servers
    public function OsServer ()
    {
        return $this->hasMany(Servers::class,'os_id');
    }
}