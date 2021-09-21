<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\DriverDetail;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vehicleId = '')
    {
        $vehicles = Vehicle::select('*');
        if (auth()->user()->user_type === 2 && $vehicleId == '') {
            $vehicles = $vehicles->where('vendor_id', auth()->id());
        }
        if($vehicleId != '') {
            $vehicles = $vehicles->where('id', base64_decode($vehicleId))  ;
        }
        $vehicles = $vehicles->with('vehicleType')->get();
        // dd($vehicles);
        return view('modules.vehicle.vehicles.list', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleTypes = VehicleType::get();
        $drivers = User::where('user_type', 3);
        if (auth()->user()->user_type === 2) {
            $driverIds = DriverDetail::where('vendor_id', auth()->id())->pluck('user_id');
            $drivers = $drivers->whereIn('id', $driverIds);
        }
        $drivers = $drivers->get();
        return view('modules.vehicle.vehicles.add', compact('vehicleTypes', 'drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        // dd($req-> all());
        $req->validate([
            'driver_id' => 'required|numeric|min:1',
            'maker_name' => 'required|max:200|string',
            'engine_model' => 'required',
            "vehicle_model" => 'required',
            "vehicle_hp" => 'required|numeric',
            "vehicle_type_id" => 'required|numeric|min:1',
            "mielege" => 'required|numeric',
            "liscence_no" => 'required',
            "vehicle_image" => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $vehicle = new Vehicle();
        $vehicle->driver_id = $req->driver_id;
        $vendor = DriverDetail::where('user_id', $req->driver_id)->first();
        $vehicle->vendor_id = $vendor->vendor_id;
        $vehicle->maker_name = $req->maker_name;
        $vehicle->engine_model = $req->engine_model;
        $vehicle->vehicle_model = $req->vehicle_model;
        $vehicle->vehicle_hp = $req->vehicle_hp;
        $vehicle->vehicle_type_id = $req->vehicle_type_id;
        $vehicle->mielege = $req->mielege;
        $vehicle->liscence_no = $req->liscence_no;
        if($req->hasFile('vehicle_image')){
            $driverImage = $req->file('vehicle_image');
            $random = randomGenerator();
            $driverImage->move('upload/vehicles/',$random.'.'.$driverImage->getClientOriginalExtension());
            $driverImageurl = 'upload/vehicles/'.$random.'.'.$driverImage->getClientOriginalExtension();
            $vehicle->vehicle_image = $driverImageurl;
        }
        $vehicle->save();

        return redirect()->route('admin.vehicles.list')
        ->with('Success','Vehicle Added SuccessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($vehicleId)
    {
        $vehicleTypes = VehicleType::get();
        $drivers = User::where('user_type', 3);
        if (auth()->user()->user_type === 2) {
            $driverIds = DriverDetail::where('vendor_id', auth()->id())->pluck('user_id');
            $drivers = $drivers->whereIn('id', $driverIds);
        }
        $drivers = $drivers->get();
        $vehicle = Vehicle::find(base64_decode($vehicleId));
        return view('modules.vehicle.vehicles.edit', compact('vehicle', 'vehicleTypes', 'drivers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        // dd($req-> all());
        $req->validate([
            'vehicleId' => 'required',
            'driver_id' => 'required|numeric|min:1',
            'maker_name' => 'required|max:200|string',
            'engine_model' => 'required',
            "vehicle_model" => 'required',
            "vehicle_hp" => 'required|numeric',
            "vehicle_type_id" => 'required|numeric|min:1',
            "mielege" => 'required|numeric',
            "liscence_no" => 'required',
            "vehicle_image" => 'mimes:jpg,jpeg,png,gif'
        ]);

        $vehicle = Vehicle::find(base64_decode($req->vehicleId));
        $vehicle->driver_id = $req->driver_id;
        $vendor = DriverDetail::where('user_id', $req->driver_id)->first();
        $vehicle->vendor_id = $vendor->vendor_id;
        $vehicle->maker_name = $req->maker_name;
        $vehicle->engine_model = $req->engine_model;
        $vehicle->vehicle_model = $req->vehicle_model;
        $vehicle->vehicle_hp = $req->vehicle_hp;
        $vehicle->vehicle_type_id = $req->vehicle_type_id;
        $vehicle->mielege = $req->mielege;
        $vehicle->liscence_no = $req->liscence_no;
        if($req->hasFile('vehicle_image')){
            $driverImage = $req->file('vehicle_image');
            $random = randomGenerator();
            $driverImage->move('upload/vehicles/',$random.'.'.$driverImage->getClientOriginalExtension());
            $driverImageurl = 'upload/vehicles/'.$random.'.'.$driverImage->getClientOriginalExtension();
            $vehicle->vehicle_image = $driverImageurl;
        }
        $vehicle->save();

        return redirect()->route('admin.vehicles.list')
        ->with('Success','Vehicle updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($vehicleId)
    {
        $vehicle = Vehicle::findOrFail(base64_decode($vehicleId));
        if($vehicle){
            $vehicle->delete();
            return redirect()->route('admin.vehicles.list')
            ->with('Success','Vehicle deleted SuccessFully');  
        } else {
            return redirect()->route('admin.vehicles.list')
            ->with('Error','Failed');
        }

    }

    /**
     * Get the location of vehicles(lat, lon).
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function getVehicleLiveLocation(Request $req)
    {
        // dd($req->all());
        $locations = Vehicle::select('*');
        if (auth()->user()->user_type === 2) {
            $locations = $locations->where('vendor_id', auth()->id());
        }
        if ($req->vehicleId) {
            // dd($req->vehicleId);
            $locations = $locations->where('id', $req->vehicleId);
            // $locations = $locations->get();
            // dd($locations);
        }
        $locations = $locations->with('driver')->get();
        // dd($locations);
        return response()->json(['error'=> false, 'message'=> 'Vehicle locations', 'data' => $locations]);
    }
}
