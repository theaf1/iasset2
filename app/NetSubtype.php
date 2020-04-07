<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetSubtype extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Networkdevices
    public function netsubtype ()
    {
        return $this->belongsTo(Networkdevices::class);
    }

}
