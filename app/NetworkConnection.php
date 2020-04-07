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
        return $this->belongsTo(Client::class);
    }
    //แสดงความสัมพันธ์กับตาราง Servers
    public function server ()
    {
        return $this->belongsTo(Servers::class);
    }

}
