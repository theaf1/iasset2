<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Multiuser extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function MultiUserClient ()
    {
        return $this->hasMany(Client::class);
    }
}
