<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerOS extends Model
{
    protected $fillable =[
        'id',
        'name',
    ];
    public function serveros ()
    {
        return $this->belongsTo(Servers::class);
    }
}