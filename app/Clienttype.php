<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clienttype extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
