<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formfactor extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง Servers
    public function FormFactorServer ()
    {
        return $this->hasMany(Servers::class,'form_factor_id');
    }
}
