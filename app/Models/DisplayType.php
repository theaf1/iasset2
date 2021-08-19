<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisplayType extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง LooseDisplay
    public function TypeLooseDisplay ()
    {
        return $this->hasMany(LooseDisplay::class,'display_type_id');
    }
}
