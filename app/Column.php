<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    protected $fillable =[
        'id',
        'name',
        'ui_name'
    ];
    public static function loadData($fileName)
    {
        $columnRecords = loadCSV($fileName);
        foreach($columnRecords as $columnRecord){
            Column::create($columnRecord);
        }
    }
}
