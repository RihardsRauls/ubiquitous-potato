<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    'path',
    'description',
    'date',
    'vehicle_id',
    ];
    
    public function vehicle() {
        return $this->belongsTo(Vehicle::class);
    }
}
