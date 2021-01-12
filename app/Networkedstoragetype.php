<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Networkedstoragetype extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function TypeNetworkedStorage ()
    {
        return $this->hasMany(Networkedstorage::class,'storage_type_id');
    }
}
