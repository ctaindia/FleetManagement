<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BatterySupplier;

class BatterySupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        $batterySuppliers = BatterySupplier::select('*');
        if($id != '') {
            $batterySuppliers = $batterySuppliers->where('id', base64_decode($id));
        }
        $batterySuppliers = $batterySuppliers->get();
        return view('modules.battery_supplier.list', compact('batterySuppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.battery_supplier.add');
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
            'name' => 'required|string|max:100'
        ]);
        $bs = new BatterySupplier;
        $bs->name = $req->name;
        $bs->save();
        return redirect()->route('admin.battery-supplier.list')
        ->with('Success','Battery supplier added SuccessFully');
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
        $bs = BatterySupplier::find(base64_decode($id));
        return view('modules.battery_supplier.edit', compact('bs'));

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
            'name' => 'required|string|max:100'
        ]);
        $bs = BatterySupplier::find(base64_decode($req->batterySupplierId));
        $bs->name = $req->name;
        $bs->save();
        return redirect()->route('admin.battery-supplier.list')
        ->with('Success','Battery supplier updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $bt = BatterySupplier::findOrFail(base64_decode($id));
        if($bt){
            $bt->delete();
            return redirect()->route('admin.battery-supplier.list')
            ->with('Success','Battery supplier deleted SuccessFully');  
        } else {
            return redirect()->route('admin.battery-supplier.list')
            ->with('Error','Failed');
        }
    }
}
