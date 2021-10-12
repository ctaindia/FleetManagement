<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatteryDetails extends Model
{
    use HasFactory,SoftDeletes;

    public function vehicleDetail() {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id'); 
    }
}
