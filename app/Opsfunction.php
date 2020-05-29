<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsfunction extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    
    public function OpsFunctionClient ()
    {
        return $this->hasMany(Client::class);
    }
}
