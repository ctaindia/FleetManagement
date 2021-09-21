<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\BatteryStatus;

class BatteryStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuels = BatteryStatus::with('vehicleDetail');
        if (auth()->user()->user_type === 2) {
            $vehicleIds = Vehicle::where('vendor_id', auth()->id())->pluck('id');
            $fuels = $fuels->whereIn('vehicle_id', $vehicleIds);
        }
        $fuels = $fuels->get();
        // dd($Fuel);
        return view('modules.battery-status.list', compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::select('*');
        if (auth()->user()->user_type === 2) {
            $vehicles = $vehicles->where('vendor_id', auth()->id());
        }
        $vehicles = $vehicles->get();
        return view('modules.battery-status.add', compact('vehicles'));
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
            "vehicle_id" => "required|numeric|min:1",
            "start_meter" => "required|numeric",
            "refference" => "required",
            "qty" => "required|numeric",
            "price" => "required|numeric",
            "date" => "required",
            "state" => "required",
            "note" => "required"
        ]);

        $fuel = new BatteryStatus();
        $fuel->vehicle_id = $req->vehicle_id;
        $fuel->start_meter = $req->start_meter;
        $fuel->refference = $req->refference;
        $fuel->qty = $req->qty;
        $fuel->price = $req->price;
        $fuel->date = $req->date;
        $fuel->state = $req->state;
        $fuel->note = $req->note;
        $fuel->save();

        return redirect()->route('admin.battery-status.list')
        ->with('Success','Fuel Added SuccessFully');
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
    public function edit($batteryStatusId)
    {
        $vehicles = Vehicle::select('*');
        if (auth()->user()->user_type === 2) {
            $vehicles = $vehicles->where('vendor_id', auth()->id());
        }
        $vehicles = $vehicles->get();
        $fuel = BatteryStatus::find(base64_decode($batteryStatusId));
        return view('modules.battery-status.edit', compact('fuel', 'vehicles'));
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
            "fuel_id" => "required|numeric|min:1",
            "vehicle_id" => "required|numeric|min:1",
            "start_meter" => "required|numeric",
            "refference" => "required",
            "qty" => "required|numeric",
            "price" => "required|numeric",
            "date" => "required",
            "state" => "required",
            "note" => "required"
        ]);

        $fuel = BatteryStatus::find(base64_decode($fuel_id));
        $fuel->vehicle_id = $req->vehicle_id;
        $fuel->start_meter = $req->start_meter;
        $fuel->refference = $req->refference;
        $fuel->qty = $req->qty;
        $fuel->price = $req->price;
        $fuel->date = $req->date;
        $fuel->state = $req->state;
        $fuel->note = $req->note;
        $fuel->save();

        return redirect()->route('admin.vehicles.list')
        ->with('Success','Vehicle updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($fuelId)
    {
        $fuel = BatteryStatus::findOrFail(base64_decode($fuelId));
        if($fuel){
            $fuel->delete();
            return redirect()->route('admin.battery-status.list')
            ->with('Success','fuel deleted SuccessFully');  
        } else {
            return redirect()->route('admin.battery-status.list')
            ->with('Error','Failed');
        }

    }
}