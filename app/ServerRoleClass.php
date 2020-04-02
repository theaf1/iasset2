<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServerRoleClass extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function serverroleclass ()
    {
        return $this->belongsTo(Servers::class);
    }
}
