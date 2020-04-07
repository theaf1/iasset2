<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clienttype extends Model
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
}
