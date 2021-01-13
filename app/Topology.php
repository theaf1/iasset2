<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topology extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];
    //แสดงความสัมพันธ์กับตาราง Upses
    public function TopologyUps ()
    {
        return $this->hasMany(Upses::class,'topology_id');
    }
}
