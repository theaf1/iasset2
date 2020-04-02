<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peripheraltype extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function peripheral ()
    {
        return $this->belongsTo(Peripherals::class);
    }
}
