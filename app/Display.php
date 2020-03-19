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
    public function gettype(){
        $this->belongsTo(Section::class);
        $this->belongsTo(clients::class);
        $this->belongsTo(Servers::class);
    }
}
