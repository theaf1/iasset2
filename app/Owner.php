<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'id',
        'name',
    ];
    public function client ()
    {
        return $this->BelongsTo(Client::class);
    }
    public function peripherals ()
    {
        return $this->belongsTo(Peripherals::class);
    }
    public function storageperipherals ()
    {
        return $this->belongsTo(Storageperipherals::class);
    }
    public function networkdevice ()
    {
        return $this->belongsTo(Networkdevices::class);
    }
    public function server ()
    {
        return $this->belongsTo(Servers::class);
    }
    public function networkedstorage ()
    {
        return $this->belongsTo(NetworkedStorage::class);
    }
    public function ups ()
    {
        return $this->BelongsTo(Upses::class);
    }
}
