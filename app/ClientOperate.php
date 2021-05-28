<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientOperate extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];

    public function ClientOperateClient ()
    {
        return $this->HasMany(Client::class,'os_id');
    }
}
