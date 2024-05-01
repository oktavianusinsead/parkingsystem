<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GateType extends Model
{
    use HasFactory;
    protected $fillable=[
        'gate_type',
        'notes',
        
    ];

    
}
