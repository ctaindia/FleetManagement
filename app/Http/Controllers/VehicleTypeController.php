<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VehicleType;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vehicleTypeId = '')
    {
        $vehicleTypes = VehicleType::select('*');
        if($vehicleTypeId != '') {
            $vehicleTypes = $vehicleTypes->where('id', base64_decode($vehicleTypeId))  ;
        }
        $vehicleTypes = $vehicleTypes->get();

        return view('modules.vehicle.vehicle-type.list', compact('vehicleTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.vehicle.vehicle-type.add');
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
            'name' => 'required|max:200|string',
            'capacity' => 'required|numeric'
        ]);
        $vehicleType = new VehicleType();
        $vehicleType->name = $req->name;
        $vehicleType->capacity = $req->capacity;
        $vehicleType->save();

        return redirect()->route('admin.vehicle.type.list')
        ->with('Success','Vehicle type Added SuccessFully');
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
    public function edit($vehicleTypeId)
    {
        $vehicleType = VehicleType::find(base64_decode($vehicleTypeId));
        return view('modules.vehicle.vehicle-type.edit', compact('vehicleType'));
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
        $req->validate([
            'vehicleTypeId' => 'required',
            'name' => 'required|max:200|string',
            'capacity' => 'required|numeric'
        ]);
        
        $vehicleType = VehicleType::find(base64_decode($req->vehicleTypeId));
        $vehicleType->name = $req->name;
        $vehicleType->capacity = $req->capacity;
        
        $vehicleType->save();

        return redirect()->route('admin.vehicle.type.list')
        ->with('Success','Vehicle type edited SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($vehicleTypeId)
    {
        $vehicleType = VehicleType::find(base64_decode($vehicleTypeId));
        if($vehicleType){
            $vehicleType->delete();
            return redirect()->route('admin.vehicle.type.list')
            ->with('Success','Vehicle type deleted SuccessFully');  
        } else {
            return redirect()->route('admin.vehicle.type.list')
            ->with('Error','Failed');
        }

    }
}
