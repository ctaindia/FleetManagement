<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DriverDetail extends Model
{
    use HasFactory,SoftDeletes;

    public function selectedVendor() {
        return $this->belongsTo('App\Models\User', 'vendor_id', 'id');
    }
}
