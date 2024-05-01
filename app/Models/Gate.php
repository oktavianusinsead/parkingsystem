<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate extends Model
{
    use HasFactory;
    protected $fillable=[
        'gate_no',
        'gate_name',
        'zone',
        'floor_level',
        'notes',
        'status',
        'parent_id',
    ];

    public function zones()
    {
        return $this->hasOne('\App\Models\ParkingZone','id','zone');
    }
    public function floors()
    {
        return $this->hasOne('\App\Models\Floor','id','floor_level');
    }
}
