<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'id',
        'building_id',
        'floor',
        'wing'
    ];
    
    public static function loadData($fileName){
        $locationRecords = loadCSV($fileName);
        foreach($locationRecords as $locationRecord){
            Location::create($locationRecord);
        }
    }
    
    public function building() {
        return $this->belongsTo(Building::class);
    }
}
