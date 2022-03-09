<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Networkedstoragetype extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    //แสดงความสัมพันธ์กับตาราง NetworkedStorage
    public function TypeNetworkedStorage ()
    {
        return $this->hasMany(Networkedstorage::class,'storage_type_id');
    }
}
