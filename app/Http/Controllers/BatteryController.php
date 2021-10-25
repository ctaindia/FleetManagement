<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Battery;
use App\Models\BatterySupplier;
use App\Models\BatteryType;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batteries = Battery::with('batterySupplierInfo', 'batteryTypeInfo')->get();
        return view('modules.battery.list', compact('batteries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bt = BatteryType::get();
        $bs = BatterySupplier::get();
        return view('modules.battery.add', compact('bt', 'bs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'date_of_supply' => 'required',
            'customer_name' => 'required|string',
            'type' => 'required|numeric|exists:App\Models\BatteryType,id',
            'rating' => 'required',
            'supplier' => 'required|string|exists:App\Models\BatterySupplier,id',
            'motor_rating' => '',
            'motor_supplier' => '',
            'controller_rating' => '',
            'controller_supplier' => '',
        ]);
        $battery = new Battery;
        $battery->date_of_supply = $req->date_of_supply;
        $battery->customer_name = $req->customer_name;
        $battery->type = $req->type;
        $battery->rating = $req->rating;
        $battery->supplier = $req->supplier;
        $battery->motor_rating = $req->motor_rating;
        $battery->motor_supplier = $req->motor_supplier;
        $battery->controller_rating = $req->controller_rating;
        $battery->controller_supplier = $req->controller_supplier;
        $battery->save();
        return redirect()->route('admin.battery.list')
        ->with('Success','Battery added SuccessFully');
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
    public function edit($id)
    {
        $battery = Battery::find(base64_decode($id));
        $bt = BatteryType::get();
        $bs = BatterySupplier::get();
        return view('modules.battery.edit', compact('battery', 'bt', 'bs'));
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
            'date_of_supply' => 'required',
            'customer_name' => 'required|string',
            'type' => 'required|numeric|exists:App\Models\BatteryType,id',
            'rating' => 'required',
            'supplier' => 'required|string|exists:App\Models\BatterySupplier,id',
            'motor_rating' => '',
            'motor_supplier' => '',
            'controller_rating' => '',
            'controller_supplier' => '',
        ]);
        $battery = Battery::find(base64_decode($req->batteryId));
        $battery->date_of_supply = $req->date_of_supply;
        $battery->customer_name = $req->customer_name;
        $battery->type = $req->type;
        $battery->rating = $req->rating;
        $battery->supplier = $req->supplier;
        $battery->motor_rating = $req->motor_rating;
        $battery->motor_supplier = $req->motor_supplier;
        $battery->controller_rating = $req->controller_rating;
        $battery->controller_supplier = $req->controller_supplier;
        $battery->save();
        return redirect()->route('admin.battery.list')
        ->with('Success','Battery data updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $battery = Battery::findOrFail(base64_decode($id));
        if($battery){
            $battery->delete();
            return redirect()->route('admin.battery.list')
            ->with('Success','Battery deleted SuccessFully');  
        } else {
            return redirect()->route('admin.battery.list')
            ->with('Error','Failed');
        }
    }
}
