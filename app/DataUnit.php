<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUnit extends Model
{
    protected $fillable =[
    'id',
    'name',    
    ];
    public function DataUnitClient()
    {
        $this->belongsTo(Client::class);
    }
    public function DataUnitStoragePeripherals()
    {
        $this->belongsTo(Storageperipherals::class);
    }
    public function DataUnitNetworkedStorage()
    {
        $this->hasMany(NetworkedStorage::class);
    }
    public function DataUnitServer ()
    {
        $this->hasMany(Servers::class);
    }
}
