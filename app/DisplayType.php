<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisplayType extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function TypeLooseDisplay ()
    {
        return $this->hasMany(LooseDisplay::class,'display_type_id');
    }
}
