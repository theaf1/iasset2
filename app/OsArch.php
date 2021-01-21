<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OsArch extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function OsArchClient ()
    {
        return $this->hasMany(Client::class,'os_arch_id');
    }
    public function OsArchServer ()
    {
        return $this->hasMany(Servers::class,'os_arch_id');
    }
}
