<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset_use_statuses extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function gettype(){
        $this->belongsTo(clients::class);
    }
}
