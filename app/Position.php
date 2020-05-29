<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function PositionClient ()
    {
        return $this->hasMany(Client::class,'position_id');
    }
}
