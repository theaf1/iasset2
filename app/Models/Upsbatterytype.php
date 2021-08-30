<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upsbatterytype extends Model
{
    protected $fillable =[
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Upses
    public function BatteryTypeUps ()
    {
        return $this->hasMany(Upses::class,'battery_type_id');
    }
}
