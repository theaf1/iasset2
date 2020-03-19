<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset_statuses extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function client()
    {
        $this->belongsTo(Client::class);
    }
}
