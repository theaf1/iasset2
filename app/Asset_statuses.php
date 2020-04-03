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
        return $this->belongsTo(Client::class);
    }
    public function peripherals ()
    {
        return $this->belongsTo(Peripherals::class);
    }
    public function storageperipherals ()
    {
        return $this->belongsTo(Storageperipherals::class);
    }
    public function networkdevices ()
    {
        return $this->belongsTo(Networkdevices::class);
    }
    public function networkedstorage ()
    {
        return $this->belongsTo(NetworkedStorage::class);
    }
    public function servers ()
    {
        return $this->belongsTo(Servers::class);
    }
    public function upses ()
    {
        return $this->belongsTo(Upses::class);
    }
}
