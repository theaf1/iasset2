<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NetworkConnection extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
    public function server ()
    {
        return $this->belongsTo(Servers::class);
    }

}
