<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    protected $fillable = [
        'id',
        'client_id', //foreign key จาก ตาราง clients
        'display_sapid',
        'display_pid',
        'display_size',
        'display_ratio',
    ];
    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
