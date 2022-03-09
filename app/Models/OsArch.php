<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OsArch extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธกับตาราง Client
    public function OsArchClient ()
    {
        return $this->hasMany(Client::class,'os_arch_id');
    }
    // แสดงความสัมพันธ์กับตาราง Server
    public function OsArchServer ()
    {
        return $this->hasMany(Servers::class,'os_arch_id');
    }
}
