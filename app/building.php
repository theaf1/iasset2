<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];
    
    public static function loadData($fileName){
        $buildingRecords = loadCSV($fileName);
        foreach($buildingRecords as $buildingRecord){
            Building::create($buildingRecord);
        }
    }
    public function BuildingLocation () {
        return $this->hasMany(Location::class,'building_id');
    }
    
}
