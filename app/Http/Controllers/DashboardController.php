<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $totalVehicle = Vehicle::get();
        $activeVehicle = Vehicle::where('status', 1)->get();
        if (auth()->user()->user_type === 2) {
            $totalVehicle = $totalVehicle->where('vendor_id', auth()->id());
            $activeVehicle = $activeVehicle->where('vendor_id', auth()->id());
        }
        $totalVehicle = $totalVehicle->count();
        $activeVehicle = $activeVehicle->count();
        $totalVendor = User::where('user_type', 2)->get()->count();
        return view('modules.dashboard', compact('totalVehicle', 'activeVehicle', 'totalVendor'));
    }
}
