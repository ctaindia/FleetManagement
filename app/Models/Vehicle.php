<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory,SoftDeletes;

    public function vehicleType() {
        return $this->belongsTo('App\Models\VehicleType', 'vehicle_type_id', 'id'); 
    }
    public function driver() {
        return $this->belongsTo('App\Models\User', 'driver_id', 'id'); 
    }
    public function vendor() {
        return $this->belongsTo('App\Models\User', 'vendor_id', 'id'); 
    }
}
