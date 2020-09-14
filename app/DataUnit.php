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
        return $this->hasMany(Client::class,'data_unit_id');
    }
    public function DataUnitStoragePeripherals()
    {
        return $this->hasMany(Storageperipherals::class);
    }
    public function DataUnitNetworkedStorage()
    {
        return $this->hasMany(NetworkedStorage::class);
    }
    public function DataUnitServer ()
    {
        return $this->hasMany(Servers::class);
    }
}
