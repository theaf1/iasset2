<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerRoleClass extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Servers
    public function serverroleclass ()
    {
        return $this->belongsTo(Servers::class);
    }
}
