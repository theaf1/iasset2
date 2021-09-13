<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
    ];

    public function RoleUser ()
    {
        return $this->hasMany(User::class,'role_id');
    }
}
