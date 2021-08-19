<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientOperate extends Model
{
    //กำหนดค่าที่สามารถแก้ไขเปลี่ยนแปลงได้
    protected $fillable = [ 
        'id',
        'name',
    ];

    public function ClientOperateClient () //แสดงความสัมพันธ์กับตาราง Client
    {
        return $this->HasMany(Client::class,'os_id');
    }
}
