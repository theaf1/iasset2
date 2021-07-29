<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisplayRatio extends Model
{
    protected $fillable =[
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง LooseDisplay
    public function DisplayRatioLoose ()
    {
        return $this->hasMany(LooseDisplay::class,'display_ratio_id');
    }
}
