<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opsfunction extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    
    //แสดงความสัมพันธ์กับตาราง Client
    public function OpsFunctionClient ()
    {
        return $this->hasMany(Client::class,'function_id');
    }
}
