<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peripheraltype extends Model
{
    //column ที่สามารถเพิ่มและแก้ไขข้อมูลได้
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Peripherals
    public function peripheral ()
    {
        return $this->belongsTo(Peripherals::class);
    }
}
