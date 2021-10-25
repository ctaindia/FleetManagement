<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Battery extends Model
{
    use HasFactory,SoftDeletes;

    public function batterySupplierInfo() {
        return $this->hasOne('App\Models\BatterySupplier', 'id', 'supplier');
    }
    
    public function batteryTypeInfo() {
        return $this->hasOne('App\Models\BatteryType', 'id', 'type');
    }
}
